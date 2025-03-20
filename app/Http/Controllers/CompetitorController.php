<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use Illuminate\Http\Request;
use App\Repositories\CompetitorRepository;
use Illuminate\Support\Facades\Validator;

class CompetitorController extends Controller
{
    protected $repo;
    /**
     * Display a listing of the resource.
     */    
    public function index(CompetitorRepository $competitorRepository,Request $request)
    {
        if (request()->ajax()) {
            $this->repo = $competitorRepository;        
           return $this->repo->dataSource($request);
        }
        return view('admin.competitor.index', ['title' => 'Competitor']);
    }


    /**
     * Show the form for creating a new resource.
     */
   
     public function create()
     {
         return view('admin.competitor.create', ['title' => 'Create Competitor']);
     }
 

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
    {

    }

    public function createOrUpdate(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'website' => 'required|url|max:100',
            'shortname' => 'required|min:3|max:100',
            'price_class_name' => 'required|min:3|max:100',
            'status' => 'nullable|string'
        ]);
        // dd($id);

        Competitor::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->input('name'),
                'website' => $request->input('website'),
                'shortname' => $request->input('shortname'),
                'price_class_name' => $request->input('price_class_name'),
                'status' => $request->input('status', 'active'),
            ]
        );
    
        $message = $id ? 'Competitor updated successfully.' : 'Competitor created successfully.';
    
        return redirect()->route('admin.competitor.index')->with('success', $message);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(competitor $competitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(competitor $competitor)
    {
        return view('admin.competitor.create', [
            'title' => 'Edit Competitor',
            'competitor' => $competitor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competitor $competitor)
    {
        return $this->createOrUpdate($request, $competitor->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $product = Competitor::findOrFail($id);
            $product->delete();
    
            return response()->json(['success' => true, 'message' => 'Competitor deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting Competitor.']);
        }
    }
    
}
