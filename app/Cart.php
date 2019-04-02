<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    //for mass assignment
    protected $fillable = ['user_id', 'id'];
    //function to relate a Cart is its cart Products
    public function products()
    {
        return $this->hasMany('App\CartProduct', 'cart_id')->with('Details');
    }
    public function ProductDetails()
    {
        return $this->hasManyThrough('App\Product', 'App\CartProduct', 'cart_id', 'id', 'id', 'product_id');
    }
}
