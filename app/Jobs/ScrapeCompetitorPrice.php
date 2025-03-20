<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use App\Models\Product;

class ScrapeCompetitorPrice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3; // Retry failed jobs
    public $timeout = 300; // 5 minutes timeout
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function handle()
    {
        $scriptPath = base_path('scripts/scraper.mjs'); // Puppeteer script path
        $url = $this->product->competitor_url;

        $process = new Process(['node', $scriptPath, $url]);
        $process->run();

        if (!$process->isSuccessful()) {
            Log::error("Scraping failed for {$url}: " . $process->getErrorOutput());

            DB::table('failed_scrapes')->insert([
                'url' => $url,
                'error_message' => $process->getErrorOutput(),
                'created_at' => now(),
            ]);

            $this->fail(); // Mark job as failed
            return;
        }

        $result = json_decode($process->getOutput(), true);

        if ($result && isset($result['price'])) {
            $this->product->update(['competitor_price' => $result['price']]);
            Log::info("Scraped price for {$url}: " . $result['price']);
        } else {
            Log::warning("No price found for {$url}");
        }
    }
}
