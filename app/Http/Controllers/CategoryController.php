<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Sort the products by HipHop
     */
    public function sortHipHop(){
        $sorted = DB::table('products')->where('category' , 'Hip Hop')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }

    /**
     * Sort the products by Rock
     */
    public function sortRock(){
        $sorted = DB::table('products')->where('category' , 'Rock')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }

    /**
     * Sort the products by Jazz
     */
    public function sortJazz(){
        $sorted = DB::table('products')->where('category' , 'Jazz')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }

    /**
     * Sort the products by Soul
     */
    public function sortSoul(){
        $sorted = DB::table('products')->where('category' , 'Soul')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }

    /**
     * Sort the products by Pop
     */
    public function sortPop(){
        $sorted = DB::table('products')->where('category' , 'Pop')->get();

        return view('category.index', ['sortedData' => $sorted]);
    }
}
