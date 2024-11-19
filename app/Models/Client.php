<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'blood_type_id', 'password', 'name', 'email', 'd_o_b', 'last_donation_date', 'city_id', 'pin_code','api_token');

    // public function setpasswordattribute($value) {
    //     $this->attributies['password']=bcrypt($value);

    // }
    public function requests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Models\Notification')->withPivot('is_read');
    }

    public function favourites()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Report');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function bloodtypes()
    {
        return $this->belongsToMany('App\Models\BloodType','blood_type_client','client_id','blood_type_id');
    }

    public function governorates()
    {
        return $this->belongsToMany('App\Models\Governorate','client_governorate','client_id','governorate_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType','blood_type_id');
    }


    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

    protected $hidden = [
        'password','api_token'
    ];


    public function getCanDonateAttribute()
    {
        $now = Carbon::now();
        $before3Months = $now->subMonths(3);
        $lastDonation = Carbon::createFromFormat('Y-m-d',$this->donation_last_date);
        if ($lastDonation->lessThanOrEqualTo($before3Months))
        {
            return true;
        }
        return false;
    }

}
