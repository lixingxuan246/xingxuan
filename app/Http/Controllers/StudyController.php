<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use App\Study;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\StorePeopleGet;
class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res=DB::table("class")->select("*")->get();
        return view("study/index",['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $username = request()->username??'';
        $where=[];
        if($username){
            $where[]=['username','like',"%$username%"];
        }
        // $res = DB::table("study")->where($where)->select("*")->get();
        $pagesize=config("app.pagesize");

        $res=Study::where($where)->paginate($pagesize);

        return view("study/list",['res'=>$res,'username'=>$username]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        //
        $data = $request->except('_token');

        $validator = Validator::make($data,[
               'username'=>'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
               'cheng'=>'numeric|between:1,99',

            ],[

                'username.regex'=>'必须是中文',
                'cheng.numeric'=>'必须是数字',
               'cheng.between'=>'不能大于100',
            ]);
         if ($validator->fails()) {
            return redirect('study')
                    ->withErrors($validator)
                    ->withInput();
                    }

        $res = DB::table("study")->insert($data);
        if($res){
            return redirect("study/create");
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
        $res = DB::table("study")->where('s_id',$id)->first();
        $data=DB::table("class")->select("*")->get();

        return view("study/update",['res'=>$res,'data'=>$data]);
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
        $data = $request->except('_token');

            $validator = Validator::make($data,[
               'username'=>['regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
                Rule::unique('study')->ignore($id,'s_id'),
                ],
               'cheng'=>'numeric|between:1,99',

            ],[

                'username.regex'=>'必须是中文',
                'username.unique'=>'名字以存在',
                'cheng.numeric'=>'必须是数字',
               'cheng.between'=>'不能大于100',
            ]);
              if ($validator->fails()) {
            return redirect('study/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
                    }

        $res=DB::table("study")->where('s_id',$id)->update($data);
        if($res){
            return redirect("study/create");
        }

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
        $res = DB::table("study")->where('s_id',$id)->delete();
        if($res){
            return redirect("study/create");
        }
    }
}
