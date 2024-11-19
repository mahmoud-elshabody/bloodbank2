<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{

    public function index()
    {

        $records = Role::paginate(10);
        return view('roles.index',compact('records'));
    }


    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'permissions_list' => 'required|array'
        ];
        $messages = [
            'name.required' => 'Name is required',
            'display_name.required' => 'Display Name is required',
            'permissions_list.required' => 'Permissions is required'
        ];
        $this->validate($request,$rules,$messages);
        $record = Role::create($request->all());
        $record->permissions()->attach($request->permissions_list);
        session()->flash('success','تــم اضــافة الرتبة بنجــاح');

        return redirect(route('role.index'));
    }



    public function edit($id)
    {
        $model = Role::findOrFail($id);
        return view('roles.edit',compact('model'));
    }



    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|unique:roles,name,'.$id,
            'display_name' => 'required',
            'permissions_list' => 'required|array'
        ];
        $messages = [
            'name.required' => 'Name is required',
            'display_name.required' => 'Display Name is required',
            'permissions_list.required' => 'Permissions is required'
        ];
        $this->validate($request,$rules,$messages);
        $record = Role::findOrFail($id);
        $record->update($request->all());
        $record->permissions()->sync($request->permissions_list);
        session()->flash('success', 'تم التحديث بنجاح');

        return back();
    }

    public function destroy($id)
    {
        $record = Role::find($id);
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
