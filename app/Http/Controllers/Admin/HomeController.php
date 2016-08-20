<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function file(Request $request)
    {
        $res = $request->file('file');
        $destinationPath = config('admin.globals.upload_path');
        $fileName = $res->getClientOriginalName();
        $res->move($destinationPath,$fileName);
        return response()->json(['thumbnail'=>'/'.$destinationPath.$fileName]);
    }
}
