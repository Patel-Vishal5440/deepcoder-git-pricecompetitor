<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OdooService1
{
    private $odooUrl;
    private $db;
    private $email;
    private $apiKey;

    public function __construct()
    {
        $this->odooUrl = "https://mobilenzo1-printnode-18541827.dev.odoo.com";
        $this->db = "mobilenzo1-printnode-18541827";
        $this->email = strtolower("sefa@mobilenzo.com"); // Ensure lowercase email
        $this->apiKey = "f1d246d51980607fd6e49f0dd329f81806a5703e";
    }

    public function authenticate()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'User-Agent' => 'Mozilla/5.0' // Mimic a real browser request
        ])->post("{$this->odooUrl}/web/session/authenticate", [
            'jsonrpc' => "2.0",
            'method' => "call",
            'params' => [
                'db' => $this->db,
                'login' => $this->email,
                'password' => $this->apiKey
            ]
        ]);

        return $response->json();
    }
}
