<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Cart;
use App\Order;
use App\User;
use App\Product;
use function Psy\debug;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::take(20)->get();

        return view('home' , ['allProducts' => $products]);

    }

    public function getAddToCart(Request $request , $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request ->session()->put('cart', $cart);
        return redirect()->route('home');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart =new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        }else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart =new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        }else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }

    public function getAddByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart =new Cart($oldCart);
        $cart->addByOne($id);

        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view ('cart.index', ['products' => $cart->items, 'totalPrice' => $cart-> totalPrice]);
    }

    public function postCheckout(Request $request){
        if (!Session::has('cart')) {
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        //make a new order and serialize the cart in it
        $order = new Order();
        $order->cart = serialize($cart);
        $order->user_id = Auth::id();

        Auth::user()->order()->save($order);
        //forget the cart
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Succesfully purchased products!');
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
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),

        ]);

        $product->save();

        return redirect('/allProducts');

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
