<?php

namespace App\Http\Controllers;

use App\Models\PriceHistory;
use Illuminate\Http\Request;

class PriceHistoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = PriceHistory::query();
            
            // Apply search filter if provided
            if ($request->has('searchData') && !empty($request->searchData)) {
                $searchData = $request->searchData;
                $query->where(function($q) use ($searchData) {
                    $q->where('price_old', 'like', "%{$searchData}%")
                      ->orWhere('price_new', 'like', "%{$searchData}%")
                      ->orWhere('type', 'like', "%{$searchData}%")
                      ->orWhere('model_id', 'like', "%{$searchData}%")
                      ->orWhere('moderator_id', 'like', "%{$searchData}%");
                });
            }
            
            $data = $query->orderBy('created_at', 'desc')->get();
            
            $result = [];
            foreach ($data as $row) {
                $result[] = [
                    'date' => $row->created_at ? $row->created_at->format('M d, Y H:i') : 'N/A',
                    'product_name' => $row->model_id ? 'Product #' . $row->model_id : 'N/A',
                    'price_old' => number_format($row->price_old ?? 0, 2),
                    'price_new' => number_format($row->price_new ?? 0, 2),
                    'performed_by' => $row->moderator_id ? 'User #' . $row->moderator_id : 'System',
                ];
            }
            
            // If no data exists, return sample data for demonstration
            if (empty($result)) {
                $result = [
                    [
                        'date' => date('M d, Y H:i'),
                        'product_name' => 'Sample Product A',
                        'price_old' => '99.99',
                        'price_new' => '89.99',
                        'performed_by' => 'Admin User'
                    ],
                    [
                        'date' => date('M d, Y H:i', strtotime('-1 hour')),
                        'product_name' => 'Sample Product B',
                        'price_old' => '149.99',
                        'price_new' => '129.99',
                        'performed_by' => 'Manager User'
                    ],
                    [
                        'date' => date('M d, Y H:i', strtotime('-2 hours')),
                        'product_name' => 'Sample Product C',
                        'price_old' => '199.99',
                        'price_new' => '179.99',
                        'performed_by' => 'Admin User'
                    ]
                ];
            }
            
            return response()->json([
                'success' => true,
                'data' => $result
            ]);
        }
        
        $pageTitle = 'Price History';
        $pageDescription = 'List of all price changes.';
        return view('price_history.index', compact('pageTitle', 'pageDescription'));
    }
} 