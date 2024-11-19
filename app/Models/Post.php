<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'post';
    public $timestamps = true;
    protected $fillable = array('name', 'image', 'content', 'category_id','title');
    protected $appends = array('thumbnail_full_path','is_favourite');
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getThumbnailFullPathAttribute()
    {
        return asset($this->thumbnail);
    }

    public function getIsFavouriteAttribute()
    {
        $user = auth()->guard('clients')->user() ?? auth()->guard('api')->user();
        if (!$user)
        {
            return false;
        }
        $favourite = $this->whereHas('favourites',function ($query) use($user){
            $query->where('client_post.client_id',$user->id);
            $query->where('client_post.post_id',$this->id);
        })->first();
        // client
        // null
        if ($favourite)
        {
            return true;
        }
        return false;
    }

    public function favourites()
    {
        return $this->belongsToMany(Client::class);
    }

    public function clients(){

        return $this->belongsToMany('App\Models\Client');
    }

}
