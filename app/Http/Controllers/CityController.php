<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;


class CityController extends Controller
{

    public function index(Request $request)
    {
        $records = City::where(function ($q) use ($request) {
            if ($request->name) {
                $q->where('name', 'LIKE', '%' . $request->name . '%');
            }
            if ($request->governorate_id) {
                $q->where('governorate_id', $request->input('governorate_id'));
            }
        })->paginate(10);
        return view('cities.index',['records'=>$records]);
    }

    public function create()
    {
        $governorates = Governorate::pluck('name', 'id')->toArray();
        return view('cities.create', ['governorates'=>$governorates]);
    }


    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required|unique:cities,name',
            'governorate_id' => 'required'
        ];
        $message = [
            'name.required'           => 'الاسم مطلوب',
            'name.unique'             => 'اسم المدينة مستخدمة من قبل',
            'governorate_id.required' => 'المحافظة مطلوبة',
        ];
        $this->validate($request, $rules, $message);
        $record = City::create($request->all());
        session()->flash('success', 'تمت إضافة المدينة بنجاح');
        return redirect(route('cities.index'));
    }

    public function edit($id)
    {
        $model = City::findOrFail($id);
        return view('cities.edit', ['model'=>$model]);
    }

    public function update(Request $request, $id)
    {
        $record = City::findOrFail($id);
        $record->update($request->all());

        return redirect()->route('cities.index')->with('success','تم التحديث بنجاح');
        }

    public function destroy($id)
    {
        $record = City::find($id);
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
}

}
