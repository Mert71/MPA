<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function add(Product $product){

        //add to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index');

    }

    public function index(){


        $cartItems = \Cart::session(auth()->id())->getContent();

    //Pass cartItems to index view
        return view('cart.index', compact('cartItems'));
    }


    //Delete item from cart
    public function destroy($itemId){
        \Cart::session(auth()->id())->remove($itemId);

        return back();
    }

    //Adjust quantity of products
    public function update($rowId){
        \Cart::session(auth()->id())->update($rowId,[
            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);

        return back();
    }

}
