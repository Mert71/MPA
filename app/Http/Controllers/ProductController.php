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

    /**
     * Find the product id, get the old cart, create new cart and put the old cart data in new cart with the new product id
     */
    public function getAddToCart(Request $request , $id){
        $product = Product::find($id);
        $cart = new Cart();
        $cart->add($product, $product->id);

        $request ->session()->put('cart', $cart);
        return redirect()->route('home');
    }

    /**
     * The function to reduce an item in the cart by one
     */
    public function getReduceByOne($id){
        $cart = new Cart();
        $cart->reduceByOne($id);
        $cart->checkForgetCart();

        return redirect()->route('product.shoppingCart');
    }

    /**
     * Remove the item regardless of the quantity
     */
    public function getRemoveItem($id){
        $cart =new Cart();
        $cart->removeItem($id);
        $cart->checkForgetCart();

        return redirect()->route('product.shoppingCart');
    }

    /**
     * Add one extra item
     */
    public function getAddByOne($id){
        $cart =new Cart();
        $cart->addByOne($id);

        return redirect()->route('product.shoppingCart');
    }

    /**
     * Get the cart object and make a new cart with the old cart in it
     */
    public function getCart(){
        if (!Session::has('cart')){
            return view('cart.index');
        }
        $cart = new Cart();
        return view ('cart.index', ['products' => $cart->items, 'totalPrice' => $cart-> totalPrice]);

    }

    /**
     * A checkout request that sends the user_id, order_id and cart items to the database.
     * Then forgets the cart and redirects to home with a success message.
     */
    public function postCheckout(Request $request){
        if (!Session::has('cart')) {
            return redirect()->route('product.shoppingCart');
        }
        $cart = new Cart();

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

}
