<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientGevernorate extends Model 
{

    protected $table = 'client_gevernorate';
    public $timestamps = true;
    protected $fillable = array('governorate_id', 'client_id');

}