<?php

namespace App\Http\Controllers;
use App\Models\Report;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {
        $records = Report::paginate(15);
        return view('reports.index',compact('records'));
    }

    public function destroy($id)
    {
        $records = Report::findOrFail($id);
        $records->delete();
        session()->flash('success', '<p style="text-align: center;font-weight: bolder">تم الحــذف</p>');

        return back();
    }
}
