<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ScraperHelper;
use App\Jobs\ScrapeCompetitorPrice;
use App\Services\CaptchaSolverService;
use App\Models\Product;

class ScraperController extends Controller
{

    protected $captchaSolver;

    public function __construct(CaptchaSolverService $captchaSolver)
    {
        $this->captchaSolver = $captchaSolver;
    }
    
    public function scrapeAllProducts()
    {
        $products = Product::whereNotNull('competitor_url')->get();

        foreach ($products as $product) {
            ScrapeCompetitorPrice::dispatch($product);
        }

        return response()->json(['message' => 'Scraping queued']);
    }

    public function scrape(Request $request)
    {
        // Example URL for CAPTCHA image
        $captchaImageUrl = 'http://example.com/captcha.png'; // Replace with actual CAPTCHA image URL

        // Solve the CAPTCHA
        $captchaSolution = $this->captchaSolver->solveCaptcha($captchaImageUrl);

        if ($captchaSolution) {
            // Use the solved CAPTCHA solution to continue with scraping logic
            // Send the CAPTCHA solution in your scraping request
            return response()->json([
                'captcha_solution' => $captchaSolution,
                'message' => 'CAPTCHA solved successfully!',
            ]);
        } else {
            return response()->json([
                'message' => 'Failed to solve CAPTCHA!',
            ], 400);
        }
    }
}

