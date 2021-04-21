<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function sortProducts($category){

        $sorted = DB::table('products')->where('category' , $category)->get();

        return view('category.index', ['sortedData' => $sorted]);
    }
}
