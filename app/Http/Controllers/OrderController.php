<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){

        $cartItems = \Cart::session(auth()->id())->getContent();
        dd($cartItems);

        return view('order.index');
    }

    /**
     * Get orders that belong to the authenticated user and return
     */
    public function getProfile(){
        $orders = Auth::user()->order;

/*
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
        } );
*/
        return view('order.profile' , ['orders' => $orders]);
    }
}
