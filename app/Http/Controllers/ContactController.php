<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $records = Contact::paginate(20);
        return view('contacts.index',compact('records'));
    }

    public function destroy($id)
    {
        $record = Contact::find($id);
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
