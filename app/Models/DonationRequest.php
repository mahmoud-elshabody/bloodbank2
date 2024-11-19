<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = false;
    protected $fillable = array('patient_name', 'phone','patient_phone', 'city_id', 'hospital_name', 'blood_type_id', 'patient_age', 'bags_num', 'hospital_address', 'details', 'latitude', 'longtude', 'client_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function governorates()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function notifications()
    {
        return $this->hasOne(Notification::class);
    }

}
