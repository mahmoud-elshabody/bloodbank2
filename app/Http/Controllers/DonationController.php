<?php

namespace App\Http\Controllers;
use App\Models\BloodType;
use App\Models\City;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationController extends Controller
{

    public function index()
    {
        $records = DonationRequest::paginate(20);
        return view('donations.index', compact('records'));
    }

    public function create()
    {
        $bloodtypes = BloodType::pluck('name', 'id')->toArray();
        $cities = City::pluck('name', 'id')->toArray();
        return view('donations.create', compact('bloodtypes', 'cities'));
    }

    public function edit($id)
    {
        $bloodtypes = BloodType::pluck('name', 'id')->toArray();
        $cities = City::pluck('name', 'id')->toArray();
        $model = DonationRequest::findOrFail($id);
        return view('donations.edit', compact('model', 'bloodtypes', 'cities'));
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'patient_name'     => 'required',
            'patient_age'      => 'required',
            'hospital_name'    => 'required',
            'hospital_address' => 'required',
            'blood_bags'       => 'required',
            'phone'            => 'required',
            'blood_type_id'    => 'required',
            'city_id'          => 'required',
            'notes'            => 'required',
        ];
        $this->validate($request, $rules);
        $record = DonationRequest::findOrFail($id);
        $record->update($request->all());
        session()->flash('success', 'تــم التحديث');

        return redirect(route('donations.index'));
    }
    public function destroy($id)
    {
        $record = DonationRequest::find($id);
        if (!$record) {
            return response()->json([
                'status'  => 0,
                'message' => 'تعذر الحصول على البيانات'
            ]);
        }

        $record->delete();
        return response()->json([
                'status'  => 1,
                'message' => 'تم الحذف بنجاح',
                'id'      => $id
            ]);
    }}
