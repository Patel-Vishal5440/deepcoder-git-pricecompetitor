<?php

namespace App\Http\Controllers;

use App\Models\WholesaleOrder;
use Illuminate\Http\Request;

class WholesaleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.wholesale-order.index',['title'=>'Wholesale Orders']);
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
    public function show(WholesaleOrder $wholesaleOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WholesaleOrder $wholesaleOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WholesaleOrder $wholesaleOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WholesaleOrder $wholesaleOrder)
    {
        //
    }
}
