<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use UDF\UDF;

class UDFController extends Controller
{
    public function sample(){
        $udf = new UDF(public_path('files/1.udf'));

        return view('udf.show', compact('udf'));
    }

    public function index(){
	print_r("Hello World!");
    }
}
