<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use App\Mail\ResetPassword;
use App\Models\RequestLog;
use App\Models\Token;

class AuthController extends Controller
{
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
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        $request->merge(['password' => bcrypt($request->password)]);
        
        $client = Client::create($request->all());
        $client->api_token =Str::random(60);
        $client->save();
        return responseJson(0,'it is working',
        ['api_token' => $client->api_token,
        'client' => $client
        ]);



    // return $request->all();

//create token array


    }

    //---------------------------------------------------------------------------------                       LOGIN              --------------------------------------------------------------------------------------------
    public function login(request $request)
    {
        $validator = validator()->make($request->all(),[
            'phone' => 'required',
            'password' => 'required',
        ]);


    if($validator->fails()){
        return responseJson(0,$validator->errors()->first(),$validator->errors());
    }

    $client=Client::where ('phone',$request->phone)->first();
    if ($client){
    if(Hash::check($request->password,$client->password ))
    {
        return responseJson(1,'it is working',[
        'api_token' => $client->api_token,
        'client'=>$client
        ]);
    }
    else{
        return responseJson(0,'the password is not correct');
    }
    }else{
        return responseJson(0,'check your phone number');
    }
    }


    // $auth= auth()->guard('api')->validate($request->all());
    // return responseJson(1,'success',$auth);


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function resetpassword(request $request){

        $user=Client::where ('phone',$request->phone)->first();

        if ($user){
            $code=rand(1111,9999);
            $update=$user->update(['pin_code'=>$code]);
            if($update)
            {
                //send sms
                // smsMisr($request->password,"your reset password is: \"$code\"");
                //send mail
                Mail::to($user->email)
                    ->bcc('mahmoudelshabody39@gmail.com')
                    ->send(new ResetPassword($user));
                return responseJson(1,'check your number',[
                'pin_code_for_test' =>$code]);
            }
            else{
                return responseJson(0,'something went wrong return again',[
                    'pin_code_for_test'=>$code,
                    'mail_fails'=>mail::failures()
                ]);
            }
        }else{
            return responseJson(0,'this is not a valid');
        }
    }
//-----------------------------------------------------------------------------------------------------------------------------------------------------------
    public function newpassword(request $request){
        $validation=validator()->make($request ->all(),[
            'pin_code'=>'required',
            'phone'=>'required',
            'password'=>'required',
        ]);
        if($validation->fails()) {
            $data=$validation->errors();
            return responseJson(0,$validation->errors(),$data);
        }

        $user= Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)
        ->where('phone',$request->phone)->first();

        if($user){
            $user->password=bcrypt($request->password);
            $user->pin_code=null;


            if($user->save()){
                return responseJson(1,'it is working');
            }else{
                return responseJson(0,'something wrong,try again');
            }
        }else{
            return responseJson(0,'this code is not working');
        }
    }
//-------------------------------------------------------------------------------------------------------------------------------------------
    public function notificationsSettings(request $request){
        RequestLog::create(['content' => $request->all(),'service' => 'Notifications Settings']);
        $rules = [
            'governorates.*' => 'exists:governorates,id',
            'blood_types.*' => 'exists:blood_types,id',
        ];
        // governorates == [1,5,13]
        // blood_types == [1,3]
        $validator = validator()->make($request->all(),$rules);
        if ($validator->fails())
        {
            return responseJson(0,$validator->errors()->first(),$validator->errors());
        }

        if ($request->has('governorates'))
        {
            // 1,2
            // sync (1,3,4)
            // 1,3,4

            $request->user()->governorates()->sync($request->governorates); // attach - detach() - toggle() - sync
        }

        if ($request->has('blood_types'))
        {
            $request->user()->bloodtypes()->sync($request->blood_types);
        }

        $data = [
            'governorates' => $request->user()->governorates()->pluck('governorates.id')->toArray(), // [1,3,4]
            // {name: asda , 'created' : asdasd , id: asdasd}
            // [1,5,13]
            'blood_types' => $request->user()->bloodtypes()->pluck('blood_types.id')->toArray(),
        ];
        return responseJson(1,'تم  التحديث',$data);
    }

    /**
     * @param Request $request
     * @return mixed
     */


//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    public function profile(Request $request){
        $validation=validator()->make($request->all(),[
            'email' => Rule::unique('clients','email')->ignore($request->user()->id),//---------------------------------------------i
            'phone' => Rule::unique('clients')->ignore($request->user()->id),
            'password' => 'confirmed',
        ]);
        if ($validation->fails())
        {
            return responseJson(0,$validation->errors()->first(),$validation->errors());
        }

        $LoginUser=$request->user();

        // $request->merge($LoginUser);----------------------------------------------------------
        $LoginUser->update($request->all());

        if ($LoginUser->has('password')){
            $LoginUser->password=bcrypt($request->password);

        }

        $LoginUser->save();

            $data = [
                'client' => $request->user()->fresh()->load('city.governorate','bloodType')//-----------------------------------
            ];

        return responseJson(1,'data has been updated',$data);

    }
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function removeToken(Request $request){
    $validation=validator()->make($request ->all(),[
        'api_token'=>'required',
    ]);
    if ($validation->fails()) {
        $data = $validation->errors();
        return responseJson(0,$validation->errors()->first(),$data);
    }

    Token::where('token',$request->token)->delete();

    return responseJson(1,'that is done');

    }
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------
public function registerToken(Request $request){
    $validation = validator()->make($request->all(), [
        'api_token' => 'required',
        'type' => 'required|in:android,ios'
    ]);

    if ($validation->fails()) {
        $data = $validation->errors();
        return responseJson(0,$validation->errors()->first(),$data);
    }
    Token::where('token',$request->token)->delete();
    $request->user()->tokens()->create($request->all());
    return responseJson(1,'success');

    }
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------

 }


// $request->user()->id;
// auth()->guard 'api'->user()->id;
