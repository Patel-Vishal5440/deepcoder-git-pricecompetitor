<?php

namespace App\Http\Controllers;

use App\Http\Requests\moderator\CreateRequest;
use App\Models\Moderator;
use Illuminate\Http\Request;
use App\Repositories\ModeratorRepository;
use App\Models\Permissions;
use App\Models\ModeratorPermissions;
class ModeratorController extends Controller
{
    protected $repo;

    public function __construct(ModeratorRepository $moderatorRepository)
    {
        $this->repo = $moderatorRepository;
    }

    public function index(Request $request)
    {
        if (request()->ajax()) {
           return $this->repo->dataSource($request);
        }
        return view('admin.moderator.index', ['title' => 'Moderator']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allPermissions = Permissions::all();
        return view('admin.moderator.create', ['title' => 'Create Moderator', 'allPermissions' => $allPermissions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $this->repo->store($request);
        return redirect()->route('admin.moderator.index');
    }


    public function createOrUpdate(CreateRequest $request, $id = null)
    {
        // Use updateOrCreate to handle both creation and updating
        $moderator = Moderator::updateOrCreate(
            ['id' => $id], // Condition to find the existing record
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'status' => $request->input('moderator_status', 1),
                'type' => $request->input('type'),

                'password' => !isset($id) && $request->input('password') 
                    ? bcrypt($request->input('password')) 
                    : ($id ? Moderator::findOrFail($id)->password : null), // Ensure we fetch the existing password
            ]
        );

        // dd($moderator);

        // Attach permissions to the moderator
        if ($request->permissions) {
            $permissionIds = Permissions::whereIn('name', $request->permissions)->pluck('id')->toArray();
            $moderator->permissions()->sync($permissionIds); // Use sync to update permissions
        }

        // Handle profile image upload
        if ($request->file('profileImage')) {
            $moderator->addMediaFromRequest('profileImage')->toMediaCollection('moderatorImage');
        }

        // Set success message
        $message = $id ? 'Moderator updated successfully.' : 'Moderator created successfully.';
        session()->flash('alert', ['message' => $message, 'type' => 'success']);

        return redirect()->route('admin.moderator.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Moderator $moderator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $moderator = Moderator::findOrFail($id);
        
        // Retrieve permission names for the specific moderator

        $moderatorPermissions = ModeratorPermissions::where('moderator_id', $moderator->id)
                                ->join('permissions', 'moderator_permissions.permission_id', '=', 'permissions.id')
                                ->pluck('permissions.name');

        // dd($moderatorPermissions); // Uncomment for debugging

        return view('admin.moderator.create', ['title' => 'Edit Moderator', 'moderator' => $moderator, 'permissions' => $moderatorPermissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moderator $moderator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // try {
            $moderator = Moderator::findOrFail($id);
            // dd($moderator);
            $moderator->delete();
            return response()->json(['success' => true, 'message' => 'Moderator deleted successfully.']);
        // } catch (\Exception $e) {
        //     return response()->json(['success' => false, 'message' => 'Error deleting Moderator.']);
        // }
    }
}
