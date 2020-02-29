<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return view("add/add");
    }

    //添加
    public function insert(Request $request){
        $data= $request->all();
        dd($data);
    }
}
