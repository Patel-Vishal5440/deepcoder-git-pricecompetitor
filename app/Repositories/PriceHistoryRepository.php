<?php
namespace App\Repositories;

use App\Models\ActivityFeed;  
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Facades\DataTables;

class PriceHistoryRepository
{
    public function dataSource(Request $request)
    {
        $searchData = $request->get('searchData', null);

        $priceHistory = ActivityFeed::query()
                        ->with(['product', 'moderator'])
                        ->when($searchData, function (Builder $query, $searchData) {
                            return $query->where(function ($query) use ($searchData) {
                                $query->where('type', 'product-price-update')
                                    ->where('product_id', 'like', "%{$searchData}%")
                                    ->orWhere('moderator_id', 'like', "%{$searchData}%")
                                    ->orWhere('price_old', 'like', "%{$searchData}%")
                                    ->orWhere('price_new', 'like', "%{$searchData}%")
                                    ->orWhere('type', 'like', "%{$searchData}%");
                            });
                        })
                        ->join('moderators', 'activity_feeds.moderator_id', '=', 'moderators.id')
                        ->join('products', 'activity_feeds.model_id', '=', 'products.id')
                        ->select([
                            'activity_feeds.id', 
                            'activity_feeds.created_at as date',
                            'moderators.name as performed_by',
                            'products.name as product_name',
                            'activity_feeds.price_old',
                            'activity_feeds.price_new'
                        ])
                        ->latest('activity_feeds.id')->get();

        return $this->priceHistoryDataTable($priceHistory);
    }

    public function priceHistoryDataTable($priceHistory)
    {
        return DataTables::of($priceHistory)->make(true);
    }
    
}
