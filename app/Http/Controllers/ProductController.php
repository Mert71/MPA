<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function sortHipHop(){
        $sorted = DB::table('products')->where('category' , 'Hip Hop')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }

    public function sortRock(){
        $sorted = DB::table('products')->where('category' , 'Rock')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }

    public function sortJazz(){
        $sorted = DB::table('products')->where('category' , 'Jazz')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }

    public function sortSoul(){
        $sorted = DB::table('products')->where('category' , 'Soul')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }

    public function sortPop(){
        $sorted = DB::table('products')->where('category' , 'Pop')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }


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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
