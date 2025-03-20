<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PriceHistoryRepository;

class PriceHistoryController extends Controller
{
    protected $repo;

    /**
     * Display a listing of the resource.
     */
    public function index(PriceHistoryRepository $priceHistoryRepository, Request $request)
    {
        if (request()->ajax()) {
            $this->repo = $priceHistoryRepository;        
            return $this->repo->dataSource($request);
        }
        $title = "Price History";
        return view('admin.price-history.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

}
