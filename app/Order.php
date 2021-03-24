<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = "orders";

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    /**
     * get the cart attribute and unserialize the value
     */

    public function getCartAttribute($value) {
        return unserialize($value);
    }

}
