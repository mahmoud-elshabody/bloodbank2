<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        $categories=Category::paginate(10);
        if(!$categories){
            return ('<h1>Not found</h1>');
        }
        return view('categories.index',['categories'=>$categories]);
    }

    public function show(){
        //
    }
    public function edit($id){
        $categories=Category::findOrFail($id);
        return view('categories.edit',['model'=>$categories]);
    }

    public function update($id,Request $request){

    $rules = [
        'name' => 'required',
    ];
    $message = [
        'name.required' => 'Name is required',
    ];
    $this->validate($request,$rules,$message);
    $category=Category::findOrFail($id);
    $category -> update($request->all());
    session()->flash('success', 'تم التحديث بنجاح');
}

    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Name is required'
        ];
        $this->validate($request, $rules, $messages);
        $category=Category::create($request->all());
        return redirect(route('categories.index'));

    }

    public function delete($id){
        $categories=Category::find($id);
        if (!$categories) {
            return response()->json([
                'status'  => 0,
                'message' => 'تعذر الحصول على البيانات']);
            }
            $categories->delete();
                return response()->json([
                    'status'  => 1,
                    'message' => 'تم الحذف بنجاح',
                    'id'      => $id
            ]);
        }
}
