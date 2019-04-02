<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart as Cart;
use App\Http\Controllers\ProductController;

class CartProduct extends Model
{
    //sets the name of the table because I messed up the naming convention
    protected $table = 'cart_product';
    //statement for mass assignment
    protected $fillable = ['product_id', 'quantity', 'cart_id'];
    //establishing the relationship with the cart
    public function Cart()
    {
        return $this->belongsTo('App\Cart', 'id', 'cart_id');
    }
    //method to define the inverse relationship of the Products
    public function Details()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
