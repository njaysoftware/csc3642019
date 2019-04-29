<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    //allows for mass assignment
    protected $fillable = ['customer_ID', 'order_number', 'shipping_address', 'shipping_city', 'shipping_state', 'shipping_zip', 'payment_method', 'order_date',];
}
