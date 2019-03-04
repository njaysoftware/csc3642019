<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['description', 'price', 'picture', 'sku', 'qty_available', 'date_added', 'supplier_ID', 'supplier_SKU', 'cost', 'supplier_ID', 'name'];
}
