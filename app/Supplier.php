<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table='suppliers';

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['name', 'address', 'city', 'state', 'zip',
        'phone', 'email', 'contact_name', 'web_site'];





}
