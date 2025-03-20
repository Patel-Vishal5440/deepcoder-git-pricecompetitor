<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OdooService1;

class OdooController extends Controller
{
    private $odooService;

    public function __construct(OdooService1 $odooService)
    {
        $this->odooService = $odooService;
    }

    public function authenticate()
    {
        $response = $this->odooService->authenticate();

        if (isset($response['result']) && !empty($response['result']['uid'])) {
            return response()->json([
                'message' => 'Authenticated successfully!',
                'user_id' => $response['result']['uid']
            ]);
        }

        return response()->json([
            'error' => 'Authentication failed',
            'details' => $response
        ], 401);
    }
}
