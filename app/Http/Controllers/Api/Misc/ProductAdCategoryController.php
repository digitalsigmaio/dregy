<?php

namespace App\Http\Controllers\Api\Misc;

use App\ProductAdCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAdCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAdCategories = ProductAdCategory::all();

        if (count($productAdCategories)) {
            return response()->json([
                'data' => $productAdCategories
            ], 200);
        } else {
            return response()->json([
                'message' => 'Nothing found'
            ], 404);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAdCategory  $productAdCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAdCategory $productAdCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAdCategory  $productAdCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAdCategory $productAdCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAdCategory  $productAdCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAdCategory $productAdCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAdCategory  $productAdCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAdCategory $productAdCategory)
    {
        //
    }
}
