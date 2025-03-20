<?php
namespace App\Services;

use Goutte\Client;

class ProductScraper
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function scrapePhoneICDParts($url)
    {
        $crawler = $this->client->request('GET', $url);

        return [
            'name' => $crawler->filter('.product-title')->text(),
            'price' => $crawler->filter('.product-price')->text(),
            'sku' => $crawler->filter('.product-sku')->text(),
            'barcode' => $crawler->filter('.product-barcode')->text() ?? null,
        ];
    }

    public function scrapeInjuredGadgets($url)
    {
        $crawler = $this->client->request('GET', $url);

        return [
            'name' => $crawler->filter('.product-name')->text(),
            'price' => $crawler->filter('.product-price')->text(),
            'sku' => $crawler->filter('.sku')->text(),
            'barcode' => $crawler->filter('.barcode')->text() ?? null,
        ];
    }
}
