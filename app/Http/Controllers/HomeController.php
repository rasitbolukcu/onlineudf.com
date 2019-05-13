<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use UDF\UDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show(Request $request){
        if(!$request->hasFile("udf")){
            Session::flash("error", "Lütfen dosya seçiniz.");
            return redirect()->back();
        }

        $file = $request->file("udf");

        if($file->getClientOriginalExtension() != "udf"){
            Session::flash("error", "Lütfen udf uzantılı bir dosya seçiniz.");
            return redirect()->back();
        }

        $udf = new UDF($_FILES["udf"]["tmp_name"]);
        
        return view('udf.show', compact('udf')); 
    }
}
