<?php

namespace App\Repositories;

use App\Models\Moderator;
use App\Models\Permissions;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTables;

class ModeratorRepository
{
    public function store($request){
        $moderator = Moderator::create([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->moderator_status,
            'type' => $request->type,
            'password' => bcrypt($request->password)
        ]);
        // // Attach permissions to the moderator
        if ($request->permissions) {
            // dd($request->permissions);
            // Retrieve permission IDs based on the permission names
            $permissionIds = Permissions::whereIn('name', $request->permissions)->pluck('id')->toArray();
    
            // Attach the permissions to the moderator
            $moderator->permissions()->attach($permissionIds);
        }
        if ($request->file('profileImage')) {
            $moderator->addMediaFromRequest('profileImage')->toMediaCollection('moderatorImage');
        }
        session()->flash('alert', ['message' => 'Moderator Created Successfully', 'type' => 'success']);
    }

    public function dataSource($request){
        $moderator = Moderator::with('media')
                    ->when($request->input('searchData'), function (Builder $query, $searchData) {
                        return $query->where(function ($query) use ($searchData) {
                            $query->where('name', 'like', "%{$searchData}%")
                                ->orWhere('email', 'like', "%{$searchData}%");
                        });
                    })
                ->latest('id');
        return $this->moderatorDataTable($moderator);
    }
    public function moderatorDataTable($moderator){
        return DataTables::of($moderator)
        ->addColumn('image', function ($moderator) {
            $data = $moderator->getFirstMediaUrl('moderatorImage');
            if ($data) {
                return "<a href='${data}'><img src='${data}' alt='Image' style='width: 50px; height: 50px; object-fit: cover;' /></a>";
            }
            return "<span>No Image</span>";
        })->addColumn('action', function ($moderator) {
            $editUrl = route('admin.moderator.edit', $moderator->id);
            $deleteUrl = route('admin.moderator.destroy', $moderator->id);
            
        
            if ($moderator->type != "admin") {
                return "<a href='$editUrl' >
                    <i class='fa-solid fa-pen icon edit-icon'  style='color:#008CBA;margin:2px'></i></a>
                    <a href='javascript:void(0);' onclick='confirmDelete(\"$deleteUrl\")'>
                    <i class='fa-solid fa-trash icon' style='color:#f44336'></i></a>";
            }
            return "<a href='$editUrl' >
                    <i class='fa-solid fa-pen icon edit-icon' style='color:#008CBA;margin:2px'></i></a>";
        })->addColumn('status', function ($moderator) {
            return ($moderator->status === 0) ? '<span class="bg-danger rounded p-1 text-light">InActive</span>' : '<span class="bg-success rounded p-1 text-light">Active</span>';
        })
        ->rawColumns(['image', 'action', 'status'])
        ->make(true);
    }
}