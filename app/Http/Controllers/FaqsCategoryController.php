<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFaqsCategoryRequest;
use App\Http\Requests\UpdateFaqsCategoryRequest;
use App\Models\FaqsCategory;

class FaqsCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreFaqsCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqsCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FaqsCategory  $faqsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FaqsCategory $faqsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FaqsCategory  $faqsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqsCategory $faqsCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqsCategoryRequest  $request
     * @param  \App\Models\FaqsCategory  $faqsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqsCategoryRequest $request, FaqsCategory $faqsCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FaqsCategory  $faqsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqsCategory $faqsCategory)
    {
        //
    }
}
