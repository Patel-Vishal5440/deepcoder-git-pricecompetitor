<?php
namespace App\Repositories;

use App\Models\Competitor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class CompetitorRepository
{
    public function dataSource(Request $request){
        $searchData = $request->get('searchData', null);

        Log::info('DataTables request received', [
            'searchData' => $searchData,
            'user' => auth()->user() ? auth()->user()->id : 'not authenticated'
        ]);

        $competitor = Competitor::query()
            ->when($searchData, function (Builder $query, $searchData) {
                return $query->where(function ($query) use ($searchData) {
                    $query->where('name', 'like', "%{$searchData}%")
                          ->orWhere('website', 'like', "%{$searchData}%")
                          ->orWhere('shortname', 'like', "%{$searchData}%")
                          ->orWhere('price_class_name', 'like', "%{$searchData}%");
                });
            })
            ->latest('id');

        try {
            $result = $this->competitorDataTable($competitor);
            Log::info('DataTables response generated successfully');
            return $result;
        } catch (\Exception $e) {
            Log::error('DataTables Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'error' => 'An error occurred while loading data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function competitorDataTable($competitor)
    {
        $dataTable = DataTables::of($competitor)
            ->addColumn('action', function ($competitor) {
                $editButton = "<a href='" . route('competitor.edit', $competitor->id) . "' 
                    class='btn btn-icon btn-sm btn-light-primary' 
                    style='width: 32px; height: 32px; margin-right: 5px;' title='Edit'>
                    <i class='fas fa-edit fs-6 m-0'></i></a>";
                
                $deleteButton = "<form action='" . route('competitor.delete', $competitor->id) . "' 
                    method='POST' style='display:inline;'>
                    " . csrf_field() . "
                    " . method_field('DELETE') . "
                    <button type='submit' class='btn btn-icon btn-sm btn-light-danger' 
                        style='width: 32px; height: 32px;' title='Delete'
                        onclick='return confirm(\"Are you sure you want to delete this competitor?\")'>
                        <i class='fas fa-trash fs-6 m-0'></i>
                    </button>
                </form>";
                    
                return $editButton . $deleteButton;
            })
            ->addColumn('website_link', function ($competitor) {
                if ($competitor->website) {
                    return "<a href='{$competitor->website}' target='_blank' class='text-decoration-none'>
                        {$competitor->website}
                    </a>";
                }
                return "<span class='text-muted'>N/A</span>";
            })
            ->addColumn('status', function ($competitor) {
                return "<span class='badge " . ($competitor->status ? 'bg-success' : 'bg-danger') . "'>" . 
                    ($competitor->status ? 'Active' : 'Inactive') . 
                    "</span>";  
            })
            ->editColumn('name', function ($competitor) {
                return $competitor->name ?? 'N/A';
            })
            ->editColumn('shortname', function ($competitor) {
                return $competitor->shortname ?? 'N/A';
            })
            ->editColumn('price_class_name', function ($competitor) {
                return $competitor->price_class_name ?? 'N/A';
            });
            
        return $dataTable->rawColumns(['action', 'website_link', 'status'])->make(true);
    }
} 