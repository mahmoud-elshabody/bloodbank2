<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function login(request $request)
    {
        $validator = validator()->make($request->all(),[
            'phone' => 'required',
            'password' => 'required',
        ]);


    if($validator->fails()){
        return view('front.master');
    }

    $client=Client::where ('phone',$request->phone)->first();
    if ($client){
    if(Hash::check($request->password,$client->password ))
    {
        // return responseJson(1,'it is working',[
        // 'api_token' => $client->api_token,
        // 'client'=>$client
        // ]);
    }
    else{
        return view('front.master');
    }
    }else{
        return view('front.master');
    }
    }
}
