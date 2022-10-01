<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAmenitableRequest;
use App\Http\Requests\UpdateAmenitableRequest;
use App\Models\Amenitable;

class AmenitableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAmenitableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAmenitableRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Amenitable  $amenitable
     * @return \Illuminate\Http\Response
     */
    public function show(Amenitable $amenitable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Amenitable  $amenitable
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenitable $amenitable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAmenitableRequest  $request
     * @param  \App\Models\Amenitable  $amenitable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAmenitableRequest $request, Amenitable $amenitable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Amenitable  $amenitable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenitable $amenitable)
    {
        //
    }
}
