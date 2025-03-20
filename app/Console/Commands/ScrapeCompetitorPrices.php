<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\ProductCompetitorPrice;
use Illuminate\Support\Facades\Log;

class ScrapeCompetitorPrices extends Command
{
    protected $signature = 'scrape:prices';
    protected $description = 'Scrape competitor prices using Symfony HttpClient';

    public function handle()
    {
        $client = HttpClient::create([
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                'Accept-Language' => 'en-US,en;q=0.5',
                'Connection' => 'keep-alive',
            ],
            'max_redirects' => 5,
            'verify_peer' => false, // Only if necessary for SSL issues
        ]);

        $competitor_scrape_price = ProductCompetitorPrice::all();
        
        foreach ($competitor_scrape_price as $scrapePrice) {       
            try {
                // Random delay between 3 to 7 seconds
                $delay = rand(3, 7);
                sleep($delay);
                
                $website = $scrapePrice->competitor_url;
                
                // Validate URL
                if (!filter_var($website, FILTER_VALIDATE_URL)) {
                    Log::error("Invalid URL format: {$website}");
                    $this->error("Invalid URL format: {$website}");
                    continue;
                }

                $response = $client->request('GET', $website, [
                    'timeout' => 15,
                    'max_duration' => 30,
                ]);
                
                // Verify response status
                if ($response->getStatusCode() !== 200) {
                    throw new \Exception("Invalid response status: " . $response->getStatusCode());
                }
                
                $html = $response->getContent();
        
                $crawler = new Crawler($html);
                $price = $crawler->filter('.price')->text();
                $price = preg_replace('/[^0-9.]/', '', $price);

                // $competitor->update(['price' => $price]);
                $this->info("Updated price for {$scrapePrice->competitor->name}: $$price");
                Log::info("Updated price for {$scrapePrice->competitor->name}: $$$price");
                $scrapePrice->update(['price' => $price]);

            } catch (\Exception $e) {
                Log::error("Failed to scrape {$website}: " . $e->getMessage());
                $this->error("Failed to scrape: {$website}");
                sleep(3); // Delay even after error
            }
        } 
    }
}
