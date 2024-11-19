<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{

    protected $table = 'governorates';
    public $timestamps = true;
    protected $fillable = array('name');

    public function citiies_clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donation_requests()
    {
        return $this->hasMany('App\Models\DonationRequests');
    }

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }
    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }
}
