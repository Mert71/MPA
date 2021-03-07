<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class cartController extends Controller
{

    public function __construct()
    {
        $this->cart = new Cart();
    }

    //Show the cart view with some data.
    public function index()
    {
        var_dump();
    }

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
