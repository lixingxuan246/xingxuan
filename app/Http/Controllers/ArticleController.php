<?php

namespace App\Http\Controllers;
use App\article;
use Validator;
use Illuminate\Http\Request;
use App\Http\Middleware\ArticleLogin;
use Illuminate\Support\Facades\Cache; //缓存门面
use Illuminate\Support\Facades\Redis;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("article/index");
    }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title=request()->title??'';
        $type=request()->type??'';
        $where=[];

            $where=[
                ['title','like',"%$title%"],
                ['type','like',"%$type%"],
            ];

        $page = request()->page??1;
        // Cache::flush();

        $res = redis::get('res_'.$page.'_'.$title);
        dump($res);
        if(!$res){
            echo "走db";
            $pagesize=config("app.pagesize");
            $res=article::where($where)->paginate($pagesize);
            // cache(['res_'.$page.'_'.$title=>$res],1*60);
            $res = serialize($res);
            Redis::setex('res_'.$page.'_'.$title,30,$res);
        }
        $res = unserialize($res);
        if(request()->ajax()){   // 翻译：如果是Ajax的话
            return view('article/lists',['res'=>$res,'title'=>$title,'type'=>$type]);
        }

        return view("article/list",['res'=>$res,'title'=>$title,'type'=>$type]);
    }
    //ajax唯一性验证
    public function checkOnly(){

        $title = request()->title;
        $where=[];
        if($title){
            $where[]=['title','=',$title];
        }
        $a_id = request()->a_id;
        if($a_id){
            $where[]=['a_id','!=',$a_id];
        }
        $count = article::where($where)->count();
        echo json_encode(['code'=>'00000','msg'=>'ok','count'=>$count]);
    }
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

         $validator = Validator::make($data,[
               'title'=>'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_-]{2,12}$/u',
                'sig'=>'required',

            ],[
                'title.regex'=>'必须是中文数字字母下划线',
                'sig.required'=>'不能为空',

            ]);
         if ($validator->fails()) {
            return redirect('article/')
                    ->withErrors($validator)
                    ->withInput();
                    }


        if ($request->hasFile('a_img')){
            $data['a_img']=$this->upload('a_img');
            // dd($img);

          }
        $data['time']=time();
        $res = article::create($data);
        if($res){
            return redirect('article/create');
        }
        // dd($data);
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
        $res = article::where('a_id',$id)->first();
        if($res){
            return view("article/uploads",['res'=>$res]);
        }
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
        $user=$request->except('_token');
        if ($request->hasFile('a_img')) {
            $user['a_img'] = $this->upload('a_img');
            // dd($img);

          }
        // $res = DB::table("people")->where('p_id',$id)->update($user);
        $res=article::where('a_id',$id)->update($user);
        // dd($res);
        if($res!==false){
            return redirect("article/create");

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
        $res=article::destroy($id);
        if($res){
           echo json_encode(['code'=>'00000','msg'=>'ok']);
        }
    }
}
