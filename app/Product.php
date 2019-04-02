<?php

namespace App;

use App\CartProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['description', 'price', 'picture', 'sku', 'qty_available', 'date_added', 'supplier_ID', 'supplier_SKU', 'cost', 'supplier_ID', 'name'];

    //define the one to many relationship to cart Product 
    public function ProductsInCart()
    {
        //specifies for sure what columns the relationship is based on
        return $this->belongsToMany('App\CartProducts', 'product_id', 'id');
    }
}
