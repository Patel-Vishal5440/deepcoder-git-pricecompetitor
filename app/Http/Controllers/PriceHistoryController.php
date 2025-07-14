<?php

namespace App\Http\Controllers;

use App\Models\ActivityFeed;
use Illuminate\Http\Request;

class PriceHistoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = ActivityFeed::with(['product', 'user']);
            
            // Apply search filter if provided
            if ($request->has('searchData') && !empty($request->searchData)) {
                $searchData = $request->searchData;
                $query->where(function($q) use ($searchData) {
                    $q->where('price_old', 'like', "%{$searchData}%")
                      ->orWhere('price_new', 'like', "%{$searchData}%")
                      ->orWhere('type', 'like', "%{$searchData}%")
                      ->orWhere('model_id', 'like', "%{$searchData}%")
                      ->orWhere('user_id', 'like', "%{$searchData}%")
                      // Filter by product name
                      ->orWhereHas('product', function($q2) use ($searchData) {
                          $q2->where('name', 'like', "%{$searchData}%");
                      })
                      // Filter by user name
                      ->orWhereHas('user', function($q3) use ($searchData) {
                          $q3->where('name', 'like', "%{$searchData}%");
                      });
                });
            }
            
            $data = $query->orderBy('created_at', 'desc')->get();
            
            
            $result = [];
            foreach ($data as $row) {
                // dd($row->user->name);
                $result[] = [
                    'date' => date('m/d/Y H:i', strtotime($row->created_at)),
                    'product_name' => $row->product ? $row->product->name : 'N/A',
                    'price_old' => number_format($row->price_old ?? 0, 2),
                    'price_new' => number_format($row->price_new ?? 0, 2),
                    'performed_by' => $row->user ? $row->user->name : 'System',
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