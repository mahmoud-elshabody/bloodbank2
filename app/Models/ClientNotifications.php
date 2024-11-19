<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientNotifications extends Model 
{

    protected $table = 'client_notification';
    public $timestamps = true;
    protected $fillable = array('is_read', 'client_id', 'notifiaction_id');

}