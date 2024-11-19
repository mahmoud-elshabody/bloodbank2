<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;/////////////////////////////////////////////////////////////////////////////////////////////

class Role extends Model
{
    protected $fillable = ['name','display_name','description'];

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
