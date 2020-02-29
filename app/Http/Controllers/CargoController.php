<?php

namespace App\Http\Controllers;
use App\Cargo;
use Illuminate\Http\Request;
use App\login;
use App\Http\Middleware\cargologin;
class CargoController extends Controller
{
    //
    public function index($id){
        $res = login::where('l_id',$id)->first();
        if($res['level']==1){
            return view('cargo/index');
        }else{
            return redirect('cargo/list');
        }

    }
    public function insert(){
        $data = request()->except('_token');
        $data['level']=2;
        $res = login::create($data);
        if($res){
            return redirect('cargo/list');
        }
    }


    public function login(){
        return view('cargo/login');
    }

    public function logindo(){
        $data = request()->except('_token');

          // $data['pwd'] = md5(md5($data['pwd']));
        $res = login::where($data)->first();



        if($res){
            session(['cargo'=>$res]);

if($res['level']==1){
     return view('cargo/listdo');
 }else{
    return redirect('cargo/list');
 }


        }else{
            return redirect('cargo/login');
        }
    }
 public function list(){
        $res = login::all();
        return view('cargo/list',['res'=>$res]);
    }

    public function delete($id){
        $res = login::where('l_id',$id)->first();
        if($res['level']==2){
            return redirect('cargo/list');
        }
        $res = login::destroy($id);
        if($res){
            return redirect('cargo/list');
        }
    }

}
        // if(strlen($res['pwd'])>6){
        //     $res['level']=1;
        // }else{
        //     $res['level']=2;
        // }

        // if($res['level']==1){
        //     return view('cargo/listdo');
        // }