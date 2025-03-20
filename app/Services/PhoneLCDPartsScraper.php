<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class PhoneLCDPartsScraper
{
    protected $url = 'https://www.phonelcdparts.com';

    public function scrapeProducts()
    {
        // Step 1: Fetch the HTML content
        $response = Http::get($this->url);

        if ($response->failed()) {
            return ['error' => 'Failed to retrieve website content'];
        }

        $html = $response->body();
        $crawler = new Crawler($html);

        $products = [];

        // Step 2: Extract product details
        $crawler->filter('.product-item')->each(function (Crawler $node) use (&$products) {
            $nameNode = $node->filter('.product-title');
            $priceNode = $node->filter('.price');
            $imageNode = $node->filter('.product-image img');
            $linkNode = $node->filter('.product-title a');

            $products[] = [
                'name' => $nameNode->count() ? trim($nameNode->text()) : 'N/A',
                'price' => $priceNode->count() ? trim($priceNode->text()) : 'N/A',
                'image' => $imageNode->count() ? $imageNode->attr('src') : '',
                'link'  => $linkNode->count() ? $linkNode->attr('href') : '',
            ];
        });

        return $products;
    }
}
