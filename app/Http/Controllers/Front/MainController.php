<?php

namespace App\Http\Controllers\Front;

use App\Models\Client;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function home(Request $request)
    {
        $posts = Post::take(9)->get();
        return view('front.home',compact('posts'));
    }


    public function about()
    {
        return view('front.who-are-us');
    }
    public function articles()
    {
        return view('front.article');
    }
    public function donation_requests()
    {
        return view('front.donation-requests');
    }
    public function who_are_us()
    {
        return view('front.who-are-us');
    }
    public function contact_us()
    {
        return view('front.contact-us');
    }
    public function inside()
    {
        return view('front.inside');
    }

    public function toggleFavourite(Request $request)
    {
        $toggle = $request->user()->favourites()->toggle($request->post_id);
        return responseJson(1,'success',$toggle);
    }
}
