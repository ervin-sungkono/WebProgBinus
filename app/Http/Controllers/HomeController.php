<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function result(Request $request){
        $a = $request->a;
        $b = $request->b;
        return view('result', compact(['a','b']));
    }
}
