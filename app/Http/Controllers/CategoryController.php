<?php

namespace App\Http\Controllers;
use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // showMsg(1,'Hello World!');
$res=category::all();
        return view("category/list",['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = category::all();
        $data = CreateTree($data);
        return view("category/index",['data'=>$data]);
    }

    // public function CreateTree($data,$parent_id=0,$level=1){
    //     if(!$data){
    //         return;
    //     }
    //     static $newarray=[];
    //     foreach($data as $k=>$v){
    //         if($v->parent_id==$parent_id){
    //             $v->level=$level;
    //             $newarray[]=$v;

    //         //调用自身
    //         $this->CreateTree($data,$v->c_id,$level+1);
    //     }
    // }
    // return $newarray;

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        $res = category::create($data);
        if($res){
            return redirect("category/index");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = category::destroy($id);
        if($res){
            echo json_encode(['code'=>'00000','msg'=>'ok']);
        }
    }
}
