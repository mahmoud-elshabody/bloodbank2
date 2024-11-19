<?php

namespace App\Http\Controllers;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{

    public function index(Request $request)
    {
        $records = Governorate::where(function ($q)use($request){
            $q->where('name','LIKE', '%' . $request->name . '%');
        })->paginate(10);
        return view('governorates.index',compact('records'));
    }

    public function create()
    {
        return view('governorates.create');
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:governorates,name'
        ];
        $messages = [
            'name.required' => 'اسم المحافظة مطلوب',
            'name.unique' => 'هذا الاسم مستخدم بالفعل',
        ];
        $this->validate($request,$rules,$messages);

//        $record = new Governorate;
//        $record->name = $request->input('name');
//        $record->save();

        $record = Governorate::create($request->all());

        session()->flash('success',"تم إضافة المدينة بنجاح");

        return redirect(route('governorates.index'));
    }

    public function edit($id)
    {
        $model = Governorate::findOrFail($id);
        return view('governorates.edit',compact('model'));
    }

    public function update(Request $request, $id)
    {
        $record = Governorate::findOrFail($id);
        $record->update($request->all());
        session()->flash('success', "تم تعديل المدينة بنجاح");

        return redirect(route('governorates.index'));
    }

    public function destroy($id)
    {
        $record = Governorate::find($id);
        if (!$record) {
            return response()->json([
                'status'  => 0,
                'message' => 'تعذر الحصول على البيانات'
            ]);
        }
        if($record->cities()->count())
        {
            return response()->json([
                    'status' => 0,
                    'message' => 'لا يمكن الحذف, يوجد مدن مرتبطة بالمحافظة',
                ]);
        }
        $record->delete();
        return response()->json([
                'status'  => 1,
                'message' => 'تم الحذف بنجاح',
                'id'      => $id
            ]);
    }}
