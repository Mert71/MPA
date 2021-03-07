<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;
use App\Order;

class OrderController extends Controller
{
    public function index(){

        $cartItems = \Cart::session(auth()->id())->getContent();
        dd($cartItems);

        return view('order.index');
    }
}
