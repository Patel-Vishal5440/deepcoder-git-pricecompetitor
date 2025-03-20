<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\ScraperHelper;

class RetryFailedScrapes extends Command
{
    protected $signature = 'scraper:retry-failed';
    protected $description = 'Retry failed scrapes from the failed_urls.txt file';

    public function handle()
    {
        $failedUrls = file('failed_urls.txt', FILE_IGNORE_NEW_LINES);
        if (!$failedUrls) {
            $this->info('No failed scrapes to retry.');
            return;
        }

        foreach ($failedUrls as $url) {
            $price = ScraperHelper::scrapeWithPuppeteer($url);
            if ($price) {
                $this->info("Successfully retried: $url");
            } else {
                $this->error("Failed again: $url");
            }
        }

        // Clear failed URLs after retrying
        file_put_contents('failed_urls.txt', '');
    }
}

