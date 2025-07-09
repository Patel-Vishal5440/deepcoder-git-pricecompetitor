<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Competitor;
use Illuminate\Validation\Rule;

class CompetitorController extends Controller {
    
    /**
     * Display a competitor list of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $pageTitle = 'Competitor List';
        $pageDescription = 'Some description for the page';

        $search = $request->input('search');
        $perPage = $request->input('per_page', 10);

        $query = Competitor::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('website', 'like', '%' . $search . '%')
                    ->orWhere('shortname', 'like', '%' . $search . '%')
                    ->orWhere('price_class_name', 'like', '%' . $search . '%');
            });
        }

        $competitors = $query->orderBy('id', 'DESC')->paginate($perPage);

        return view('competitor.competitors', compact('pageTitle', 'pageDescription', 'competitors', 'search', 'perPage'));
    }

    /**
     * Display a add new competitor of the resource.
     *
     * @return \Illuminate\View\View
     */
     public function create(){
        $pageTitle = 'Create new Competitor';
        $pageDescription = 'Some description for the page';
        return view('competitor.new_competitor',compact('pageTitle', 'pageDescription'));
     }

     /**
     * Store a newly created competitor resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request){
         $validators = Validator::make($request->all(),[
             'name'=>'required|string|max:255',
             'website'=>'nullable|url|max:255',
             'shortname'=>'required|string|max:100',
             'price_class_name'=>'required|string|max:255',
             'status'=>'required|in:1,0'
         ]);

         if($validators->fails()){
             return redirect()->route('competitor.create')->withErrors($validators)->withInput();
         }else{
            $competitor = new Competitor();
            $competitor->name = $request->name;
            $competitor->website = $request->website;
            $competitor->shortname = $request->shortname;
            $competitor->price_class_name = $request->price_class_name;
            $competitor->status = $request->status;
            $competitor->save();
            return redirect()->route('competitor.list')->with('create','Competitor created successfully !');
         }         
     }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id){
        $pageTitle = 'Edit Competitor';
        $pageDescription = 'Some description for the page';
        $find_competitor = Competitor::where('id',$id)->get();
        return view('competitor.edit_competitor',compact('pageTitle', 'pageDescription','find_competitor'));
     }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request,$id){
        $validators = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'website'=>'nullable|url|max:255',
            'shortname'=>'required|string|max:100',
            'price_class_name'=>'required|string|max:255',
            'status'=>'required|in:1,0'
        ]);

        if($validators->fails()){
            return redirect()->route('competitor.edit',$id)->withErrors($validators)->withInput();
        }else{
           $competitor = Competitor::findOrFail($id);
           $competitor->name = $request->name;
           $competitor->website = $request->website;
           $competitor->shortname = $request->shortname;
           $competitor->price_class_name = $request->price_class_name;
           $competitor->status = $request->status;
           $competitor->save();
           return redirect()->route('competitor.list')->with('update','Competitor updated successfully !');
        }   
     }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function delete($id){
         $find_competitor = Competitor::findOrFail($id);
         $find_competitor->delete();
         return redirect()->route('competitor.list')->with('delete','Competitor deleted successfully !');
     }
}
