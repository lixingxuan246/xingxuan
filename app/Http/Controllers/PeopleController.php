<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use App\People;
use Illuminate\Http\Request;
use App\Http\Requests\StorePeoplePost;
class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('people/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $data=DB::table("people")->select("*")->get();
        $username=request()->username??'';
        $where=[];
        if($username){
            $where[]=['username','like',"%$username%"];
        }


        $pagesize=config("app.pagesize");
        $data = People::where($where)->orderby('p_id','desc')->paginate($pagesize);

        return view("people.list",['data'=>$data,'username'=>$username]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        //第一种表单验证
        // $request->validate([
        //         'username'=>'required|unique:people|max:12|min:2',
        //         'age'=>'required|integer|min:1|max:3',
        //     ],[
        //         'username.required'=>'名字不能为空',
        //         'age.required'=>'年龄长度不够',
        //     ]
        //     );

         $data=$request->except('_token');

         $validator = Validator::make($data,[
               'username'=>'required|unique:people|max:12|min:2',
                'age'=>'required|integer|between:1,99',

            ],[
                'username.required'=>'名字不能为空',
                'age.required'=>'年龄长度不够',
                'age.between'=>'年龄太大',
            ]);
         if ($validator->fails()) {
            return redirect('people')
                    ->withErrors($validator)
                    ->withInput();
                    }


         //数据中是否有上传的图片
         if ($request->hasFile('head')) {
            $data['head'] = $this->upload('head');
            // dd($img);

          }

        $data['add_time']=time();
        // $res=DB::table('people')->insert($data);   insert方法添加
       $res=People::create($data);    // create方法添加
       // $people = new People;
       // $people->username=$request->username;
       // $people->age=$request->$data['age'];
       // $people->card=$request->card;
       // $people->head=$request->head;
       // $res=$people->save();            //save方法添加


        if($res){
            return redirect('/laravel');
        }

    }
    /**
     *上传文件
     *
     */
    public function upload($filename){
        //判断上传过程有无错误
        if (request()->file($filename)->isValid()){
            //接收值
            $photo = request()->file($filename);
            //上传   移动到指定目录下
            $store_result = $photo->store('uploads');
            return $store_result;
        }
        exit("未获取到上传文件或获取失败");
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
     *修改视图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $res = DB::table("people")->where("p_id",$id)->first();
        return view("people/updata",['res'=>$res]);

    }

    /**
     * Update the specified resource in storage.
     *修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=$request->except('_token');
        if ($request->hasFile('head')) {
            $user['head'] = $this->upload('head');
            // dd($img);

          }
        // $res = DB::table("people")->where('p_id',$id)->update($user);
        $res=People::where('p_id',$id)->update($user);
        // dd($res);
        if($res!==false){
            return redirect("laravel");

    }
}
    /**
     * Remove the specified resource from storage.}

     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $res = DB::table("people")->where('p_id',$id)->delete();
        $res=People::destroy($id);
        // dd($res);
        if($res){
            return redirect("laravel");

        }
    }
}
