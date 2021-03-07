<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart
{
    public $items = null;
    public $totalQty;
    public $totalPrice;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        $storedItem = ['qty' => 0, 'price'=>$item->price, 'item'=>$item]; //Creating an associative array for the Stored Item

        //Check if the added item already exists in the array //Cart// and overwrite it to only keep a product once. //instead of multiple times.
        if ($this->items) {
            if (array_key_exists($id , $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice+= $item->price;
    }

    public function reduceByOne($id){
        $this->items [$id]['qty']--;
        $this->items [$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];

        if($this->items[$id]['qty'] <=0){
            unset($this->items[$id]);
        }
    }

    public function removeItem($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];

        unset($this->items[$id]);
    }

    public function addByOne($id){
        $this->items [$id]['qty']++;
        $this->items [$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalPrice += $this->items[$id]['item']['price'];
    }


    public function show()
    {
        //Retrieves all the data from the session.
        return session('cart');
    }

}
