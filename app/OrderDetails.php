<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //used to establish massassignment from the controller
    protected $fillable = ['order_ID', 'product_ID', 'fulfilled_by_ID', 'price', 'quantity', 'ship_date'];
}
