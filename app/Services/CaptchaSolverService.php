<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class CaptchaSolverService
{
    protected $apiKey;
    protected $client;

    public function __construct()
    {
        $this->apiKey = env('CAPTCHA_API_KEY'); // Add your 2Captcha API key in .env
        $this->client = new Client(['timeout' => 10]); // Set a timeout for requests
    }

    public function solveCaptcha($imageUrl)
    {
        // Step 1: Get the CAPTCHA image
        $captchaImage = $this->getCaptchaImage($imageUrl);

        if (!$captchaImage) {
            Log::error("Failed to fetch CAPTCHA image from: $imageUrl");
            return null;
        }

        try {
            // Step 2: Send CAPTCHA to 2Captcha
            $response = $this->client->post('http://2captcha.com/in.php', [
                'form_params' => [
                    'key' => $this->apiKey,
                    'method' => 'base64',
                    'body' => base64_encode($captchaImage),
                    'json' => 1
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);

            if ($data['status'] === 1) {
                $captchaId = $data['request'];

                // Step 3: Wait for the CAPTCHA to be solved
                return $this->getSolvedCaptcha($captchaId);
            }
        } catch (RequestException $e) {
            Log::error("2Captcha request failed: " . $e->getMessage());
        }

        return null;
    }

    private function getCaptchaImage($url)
    {
        try {
            $response = $this->client->get($url, [
                'stream' => true, // Get raw image data
            ]);

            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            Log::error("Failed to fetch CAPTCHA image: " . $e->getMessage());
            return null;
        }
    }

    private function getSolvedCaptcha($captchaId)
    {
        // Retry up to 10 times with a 5-second delay
        for ($i = 0; $i < 10; $i++) {
            sleep(5);

            try {
                $response = $this->client->get('http://2captcha.com/res.php', [
                    'query' => [
                        'key' => $this->apiKey,
                        'action' => 'get',
                        'id' => $captchaId,
                        'json' => 1
                    ]
                ]);

                $data = json_decode($response->getBody()->getContents(), true);

                if ($data['status'] === 1) {
                    return $data['request']; // CAPTCHA solved!
                }
            } catch (RequestException $e) {
                Log::error("Failed to retrieve solved CAPTCHA: " . $e->getMessage());
            }
        }

        Log::error("Failed to get CAPTCHA solution after multiple attempts.");
        return null;
    }
}
