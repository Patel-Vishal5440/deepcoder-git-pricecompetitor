<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\Competitor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTables;

class ProductRepository
{
    public function dataSource(Request $request){
        $searchData = $request->get('searchData', null);

        $product = Product::query()
            ->when($searchData, function (Builder $query, $searchData) {
                return $query->where(function ($query) use ($searchData) {
                    $query->where('name', 'like', "%{$searchData}%")
                          ->orWhere('default_code', 'like', "%{$searchData}%");
                });
            })
            ->latest('id');

        return $this->productDataTable($product);
    }

    public function productDataTable($product)
    {
        $competitors = Competitor::getCompetitorNames();

        $dataTable = DataTables::of($product)
            ->addColumn('action', function ($product) {
                $editUrl = route('admin.competitor.edit', $product->id);
                $deleteUrl = route('admin.competitor.destroy', $product->id);

                $editButton = "<a href='$editUrl'>
                    <i class='fa-solid fa-pen icon edit-icon' style='color:#008CBA;margin:2px'></i></a>";

                // $deleteButton = "<a href='javascript:void(0);' onclick='confirmDelete(\"$deleteUrl\")'>
                //     <i class='fa-solid fa-trash icon' style='color:#f44336'></i></a>";

                $syncButton = "<a href='javascript:void(0);' 
                    class='btn btn-icon btn-sm btn-light-primary sync-product' 
                    data-product-id='{$product->odoo_id}'
                    style='width: 32px; height: 32px;'>
                    <i class='fas fa-sync fs-6'></i></a>";
                    
                return ($product->type != "admin") ? $syncButton : '';
            })
            ->addColumn('status', function ($product) {
                return "<span class='badge " . ($product->status ? 'bg-success' : 'bg-danger') . "'>" . 
                    ($product->status ? 'Active' : 'Inactive') . 
                    "</span>";  
            });

            foreach ($competitors as $key => $competitor) {
                $dataTable->addColumn("competitor_{$key}", function ($product) use ($competitor) {
                    return $competitor ?? '-';
                });
                $dataTable->addColumn("competitor_ink_{$key}", function ($product) use ($key) {
                    $competitor_url = $product->competitorPrices()
                        ->where('competitor_id', $key)
                        ->value('competitor_url');
                    return $competitor_url ?: ' ';
                });

                $dataTable->addColumn("competitor_price_{$key}", function ($product) use ($key) {
                    $price = $product->competitorPrices()
                        ->where('competitor_id', $key)
                        ->value('price');
                    return $price ? number_format($price, 2) : '0.00';
                });
            }

            // foreach ($competitors as $key => $competitor) {
            //     $dataTable->addColumn("competitor_{$key}", function ($product) use ($key) {
            //         // Get price for this product and competitor combination
            //         $price = $product->competitorPrices()
            //             ->where('competitor_id', $key)
            //             ->value('price');
            //         return $price ? number_format($price, 2) : '-';
            //     });
                
            //     // Remove this column as it's no longer needed
            //     // $dataTable->addColumn("competitor_ink_{$key}", function ($product) use ($competitor) {       
            //     //     return $competitor;
            //     // });
            // }
            
            return $dataTable->rawColumns(['action', 'status','competitor_id'])->make(true);
    }
}
