<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OdooService
{
    protected $url = 'https://mobilenzo1-printnode-21209016.dev.odoo.com/jsonrpc';
    protected $db = 'mobilenzo1-printnode-21209016';
    protected $user_id = 2959;
    protected $api_key = '7a3bf7d78d4fdbfc88c65a6eabd0d649d6489937';

    public function fetchProducts()
    {
        $response = Http::post($this->url, [
            "jsonrpc" => "2.0",
            "id" => 10,
            "method" => "call",
            "params" => [
                "service" => "object",
                "method" => "execute_kw",
                "args" => [
                    $this->db,
                    $this->user_id,
                    $this->api_key,
                    "product.product",
                    "search_read",
                    [],
                    [
                        "fields" => ["id", "name", "default_code", "list_price", "qty_available", "barcode"],
                        "limit" => 10
                    ]
                ]
            ]
        ]);

        return $response->json();
    }

    public function updateProductPrice($productId, $newPrice)
    {
        try {
            // First, update the price
            $updateResponse = Http::post($this->url, [
                "jsonrpc" => "2.0",
                "id" => 10,
                "method" => "call",
                "params" => [
                    "service" => "object",
                    "method" => "execute_kw",
                    "args" => [
                        $this->db,
                        $this->user_id,
                        $this->api_key,
                        "product.product",
                        "write",
                        [[intval($productId)], ['list_price' => floatval($newPrice)]]
                    ]
                ]
            ]);

            $updateResult = $updateResponse->json();

            if (isset($updateResult['error'])) {
                return [
                    'success' => false,
                    'message' => $updateResult['error']['data']['message'] ?? 'Failed to update price in Odoo',
                    'error' => $updateResult['error']
                ];
            }

            // Then, read back the updated value to confirm
            $readResponse = Http::post($this->url, [
                "jsonrpc" => "2.0",
                "id" => 11,
                "method" => "call",
                "params" => [
                    "service" => "object",
                    "method" => "execute_kw",
                    "args" => [
                        $this->db,
                        $this->user_id,
                        $this->api_key,
                        "product.product",
                        "read",
                        [[intval($productId)]],
                        ["fields" => ["list_price"]]
                    ]
                ]
            ]);

            $readResult = $readResponse->json();

            if (isset($readResult['error'])) {
                return [
                    'success' => false,
                    'message' => 'Price updated but failed to verify new value',
                    'error' => $readResult['error']
                ];
            }

            return [
                'success' => true,
                'message' => 'Price updated successfully in Odoo',
                'data' => [
                    'product_id' => $productId,
                    'new_price' => $readResult['result'][0]['list_price'] ?? $newPrice
                ]
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Request failed',
                'error' => $e->getMessage()
            ];
        }
    }

    public function fetchSpecificProduct($odooId)
    {
        try {
            $response = Http::post($this->url, [
                "jsonrpc" => "2.0",
                "id" => 10,
                "method" => "call",
                "params" => [
                    "service" => "object",
                    "method" => "execute_kw",
                    "args" => [
                        $this->db,
                        $this->user_id,
                        $this->api_key,
                        "product.product",
                        "search_read",
                        [[['id', '=', (int)$odooId]]],
                        [
                            "fields" => ["id", "name", "default_code", "list_price", "qty_available", "barcode"],
                            "limit" => 1
                        ]
                    ]
                ]
            ]);

            $result = $response->json();


            if (isset($result['error'])) {
                return [
                    'success' => false,
                    'message' => $result['error']['data']['message'] ?? 'Error fetching product from Odoo',
                    'error' => $result['error']
                ];
            }

            if (empty($result['result'])) {

                return [
                    'success' => false,
                    'message' => 'Product not found in Odoo',
                    'data' => null
                ];
            }

            $result['success'] = true;
            $result['message'] = 'Product not found in Odoo';

            return  $result;

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Failed to fetch product from Odoo',
                'error' => $e->getMessage()
            ];
        }
    }
    
}