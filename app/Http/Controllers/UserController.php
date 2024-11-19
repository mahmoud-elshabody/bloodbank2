<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function changePassword()
    {
        return view('users.reset-password');
    }

    public function changePasswordSave(Request $request)
    {
        $rules = [
            'old-password' => 'required',
            'password' => 'required|confirmed',
        ];
        $messages = [
            'old-password.required' => 'كلمة السر الحالية مطلوبة',
            'password.required' => 'كلمة السر مطلوبة',
        ];
        $this->validate($request,$rules,$messages);

        $user = Auth::user();

        if (Hash::check($request->input('old-password'), $user->password)) {

            $user->password = bcrypt($request->input('password'));
            $user->save();
            session()->flash('success', 'تم تحديث كلمة المرور');;

            return view('users.reset-password');
        }else{
            session()->flash('error', 'كلمة المرور غير صحيحة');
            return view('users.reset-password');
        }

    }

    public function index()
    {
        $users = User::paginate(20);

        return view('users.index',compact('users'));
    }

    public function create(User $model)
    {
        return view('users.create',compact('model'));
    }

    public function store(Request $request)
    {
//        dd();
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'email',//required
            'roles_list'  => 'required'
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->except('roles_list'));
        $user->roles()->attach($request->input('roles_list'));

        session()->flash('success', 'تم إضافة المستخدم بنجاح');

        return redirect(route('user.index'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $model = User::findOrFail($id);
        return view('users.edit',compact('model'));
    }


    public function update(Request $request , $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'confirmed',
            'email' => 'email',//|required|unique:users,email,'.$id
            'roles_list'  => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->roles()->sync((array) $request->input('roles_list'));
        $request->merge(['password' => bcrypt($request->password)]);
        $update = $user->update($request->all());

        session()->flash('success','تم تعديل بيانات المستخدم بنجاح.');
        return redirect(route('user.edit',$id));

    }

    public function destroy($id)
    {
        $record = User::findOrFail($id);

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
