<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
}
