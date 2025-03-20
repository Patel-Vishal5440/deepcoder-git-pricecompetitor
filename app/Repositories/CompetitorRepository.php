<?php
namespace App\Repositories;

use App\Models\Competitor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Facades\DataTables;

class CompetitorRepository
{
    public function dataSource(Request $request)
    {
        $searchData = $request->get('searchData', null);

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

        return $this->competitorDataTable($competitor);
    }

    public function competitorDataTable($competitor)
    {
        return DataTables::of($competitor)
            ->addColumn('action', function ($competitor) {
                $editUrl = route('admin.competitor.edit', $competitor->id);
                $deleteUrl = route('admin.competitor.destroy', $competitor->id);

                $editButton = "<a href='$editUrl'>
                    <i class='fa-solid fa-pen icon edit-icon' style='color:#008CBA;margin:2px'></i></a>";

                $deleteButton = "<a href='javascript:void(0);' onclick='confirmDelete(\"$deleteUrl\")'>
                    <i class='fa-solid fa-trash icon' style='color:#f44336'></i></a>";

                return ($competitor->type != "admin") ? $editButton . $deleteButton : $editButton;
            })
            ->addColumn('status', function ($competitor) {
                return "<span class='badge " . ($competitor->status ? 'bg-success' : 'bg-danger') . "'>" . 
                    ($competitor->status ? 'Active' : 'Inactive') . 
                    "</span>";  
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
