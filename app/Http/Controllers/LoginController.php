<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;
class LoginController extends Controller
{
    //
    //登陆视图
    public function login(){
        $data = request()->except('_token');
        $data['pwd'] = md5(md5($data['pwd']));
        $res = login::where($data)->first();
        if($res){
            session(['login'=>$res]);
            return view('people/index');
        }

    }

    public function logindo(){
         $data = request()->except('_token');
        $data['pwd'] = md5(md5($data['pwd']));
        $res = login::where($data)->first();
        if($res){
            session(['logindo'=>$res]);
            return view('article/index');
        }
    }
}
