<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CityResource;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Contact;
use App\Models\DonationRequests;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Client;
use App\Models\RequestLog;
use App\Models\Log;
use App\Models\Token;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Support\Facades\Artisan;

class MainController extends Controller
{
    public function posts(Request $request)
    {

        $posts = Post::with('category')->where(function($post) use($request){
            if ($request->category_id)
            {
                $post->where('category_id',$request->category_id);
            }
            if ($request->keyword)
            {
                $post->searchByKeyword($request);
            }

        })->latest()->paginate(20);
        return responseJson(1, 'success', $posts);
    }

    public function donationRequests(Request $request)
    {
        RequestLog::create(['content' => $request->all(), 'service' => 'donations']);
        $donations = DonationRequest::where(function ($query) use ($request) {
            if ($request->input('governorate_id')) {
                $query->whereHas('city', function ($query) use($request){
                    $query->where('governorate_id',$request->governorate_id);
                });
            }elseif ($request->input('city_id')) {
                $query->where('city_id', $request->city_id);
            }
            if ($request->input('blood_type_id')) {
                $query->where('blood_type_id', $request->blood_type_id);
            }
        })->with('city.governorate', 'client','bloodType')->latest()->paginate(10);

        return responseJson(1, 'success', $donations);
    }

    public function post(Request $request)
    {
        RequestLog::create(['content' => $request->all(), 'service' => 'post details']);
        $post = Post::with('category')->find($request->post_id);
        if (!$post) {
            return responseJson(0, '404 no post found');
        }
        return responseJson(1, 'success', $post);
    }

    public function  donationRequest(Request $request)
    {
        RequestLog::create(['content' => $request->all(), 'service' => 'donation details']);
        $donation = DonationRequest::with('city', 'client','bloodType')->find($request->donation_id);
        if (!$donation) {
            return responseJson(0, '404 no donation found');
        }

        if ($request->user()->notifications()->where('donation_request_id',$donation->id)->first())
        {
            $request->user()->notifications()->updateExistingPivot($donation->notification->id, [
                'is_read' => 1
            ]);
        }

        return responseJson(1, 'success', $donation);
    }

    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson(1, 'success', $governorates);
    }

    public function bloodTypes()
    {
        $bloodTypes = BloodType::all();
        return responseJson(1, 'success', $bloodTypes);
    }

    public function categories()
    {
        $categories = Category::all();
        return responseJson(1, 'success', $categories);
    }

    public function cities(Request $request)
    {
        RequestLog::create(['content' => $request->all(), 'service' => 'cities']);
        $cities = City::with('governorate')->where(function ($query) use ($request) {
            if ($request->input('governorate_id'))
            {
                $query->where('governorate_id',$request->governorate_id);
            }
        })->paginate(1);
        return responseJson(1, 'success', [
            'cities' => CityResource::collection($cities),
            'pagination' => getPagination($cities)
            ]);
    }

    public function donationRequestsCreate(Request $request)
    {
        // validation
        RequestLog::create(['content' => $request->all(), 'service' => 'donation create']);
        $rules = [
            'patient_name' => 'required',
            'patient_age' => 'required:digits',
            'blood_type_id' => 'required|exists:blood_types,id',
            'bags_num' => 'required:digits',
            'hospital_address' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|digits:11',
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $donationRequests = $request->user()->requests()->create($request->all());
        $clientsIds = $donationRequests->city->governorate->clients()
                    ->whereHas('bloodtypes', function ($q) use ($request,$donationRequests) {
                        $q->where('blood_types.id', $donationRequests->blood_type_id);
                    })

            ->pluck('clients.id')->toArray();

        $send = "";
        if (count($clientsIds)) {

            $notification = $donationRequests->notifications()->create([
                'title' => 'يوجد حالة تبرع قريبة منك',
                'content' => optional($donationRequests->bloodType)->name . 'محتاج متبرع لفصيلة ',
            ]);

            $notification->clients()->attach($clientsIds);





            $tokens = Token::whereIn('client_id',$clientsIds)->where('token','!=',null)->pluck('token')->toArray();
            if (count($tokens))
            {
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donationRequests->id
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
                info("firebase result: " . $send);
            dd($send);
            }

        }

        return responseJson(1, 'تم الاضافة بنجاح', $donationRequests->load('client','city'));

    }

    public function logs()
    {
        $requests = RequestLog::latest()->paginate(50);
        return $requests;
    }

    public function notificationsCount(Request $request)
    {
        $count = $request->user()->notifications()->where(function ($query) use ($request) {

                $query->where('is_read',0);

        })->count();
        return responseJson(1, 'loaded...',[
            'notifications-count' => $count
        ]);

    }

    public function notifications(Request $request)
    {
        $items = $request->user()->notifications()->latest()->paginate(20);
        return responseJson(1, 'Loaded...', $items);
    }

    public function settings()
    {
        return responseJson(1, 'loaded', settings());
    }

    public function postFavourite(Request $request)
    {
        RequestLog::create(['content' => $request->all(), 'service' => 'post toggle favourite']);
        $rules = [
            'post_id' => 'required|exists:posts,id',
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $toggle = $request->user()->favourites()->toggle($request->post_id);// attach() detach() sync() toggle()

        return responseJson(1, 'Success', $toggle);
    }

    public function myFavourites(Request $request)
    {
        $posts = $request->user()->favourites()->with('category')->latest()->paginate(20);
        return responseJson(1, 'Loaded...', $posts);
    }

    public function contact(Request $request)
    {

        RequestLog::create(['content' => $request->all(), 'service' => 'contact us']);
        $rules = [
            'title' => 'required',
            'message' => 'required',
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $contact = $request->user()->contacts()->create($request->all());
        return responseJson(1, 'تم الارسال', $contact);
    }

    public function report(Request $request)
    {
        RequestLog::create(['content' => $request->all(), 'service' => 'report']);
        $rules = [
            'message' => 'required',
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $report = $request->user()->reports()->create($request->all());
        return responseJson(1, 'تم الارسال', $report);
    }

    public function testNotification(Request $request)
    {

        $tokens = $request->ids;
        $title = $request->title;
        $body = $request->body;
        $data = DonationRequest::first();
        $send = notifyByFirebase($title, $body, $tokens, $data);
        info("firebase result: " . $send);

        return response()->json([
            'status' => 1,
            'msg' => 'تم الارسال بنجاح',
            'send' => json_decode($send)
        ]);
    }
    public function donationRequestCreate(Request $request)
    {
        // validation
        RequestLog::create(['content' => $request->all(), 'service' => 'donation create']);
        $rules = [
            'patient_name' => 'required',
            'patient_age' => 'required:digits',
            'blood_type_id' => 'required|exists:blood_types,id',
            'bags_num' => 'required:digits',
            'hospital_address' => 'required',
            'city_id' => 'required|exists:cities,id',
            'phone' => 'required|digits:11',
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $donationRequest = $request->user()->requests()->create($request->all());

        $clientsIds = $donationRequest->city->governorate->clients()
                    ->whereHas('bloodtypes', function ($q) use ($request,$donationRequest) {
                        $q->where('blood_types.id', $donationRequest->blood_type_id);
                    })
            ->pluck('clients.id')->toArray();
        $send = "";
        if (count($clientsIds)) {
            $notification = $donationRequest->notifications()->create([
                'title' => 'يوجد حالة تبرع قريبة منك',
                'content' => optional($donationRequest->bloodType)->name . 'محتاج متبرع لفصيلة ',
            ]);
            $notification->clients()->attach($clientsIds);

            $tokens = Token::whereIn('client_id',$clientsIds)->where('token','!=',null)->pluck('token')->toArray();
            // dd($tokens);
            if (count($tokens))
            {
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donationRequest->id
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
                info("firebase result: " . $send);

            dd($send);
            }

        }

        return responseJson(1, 'تم الاضافة بنجاح', $donationRequest->load('client','city'));

    }

}












































////////////////////////////rebo/serveres////////////////
