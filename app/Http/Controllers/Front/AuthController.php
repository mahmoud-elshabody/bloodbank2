<?php

namespace App\Http\Controllers\Front;

use App\Models\Governorate;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // public function register()
    // {

    //     return view('front.auth.register');
    // }

    public function register(Request $request){
        // return $request->all();
        // $this->validate($request);
        $validator = validator()->make($request->all(),[
            'name' => 'required',
            'phone' => 'required|digits:11|unique:clients',
            'city_id' => 'required',
            'd_o_b'=>'required|date|before:last_donation_date',
            'last_donation_date' => 'required|date|before_or_equal:today|after:d_o_b',
            'email' => 'required|unique:clients',
            'password' => 'required|confirmed',
            'blood_type_id' => 'required|exists:blood_types,id',
            // 'pin_code' => 'required',
        ]);


        if($validator->fails()){
            return view('front.auth.register');
        }

        $request->merge(['password' => bcrypt($request->password)]);

        $client = Client::create($request->all());
        $client->api_token =Str::random(60);
        $client->save();
        return view('front.auth.login');
    }


    public function login(request $request)
    {

    return view('front.auth.login');

    }
}

