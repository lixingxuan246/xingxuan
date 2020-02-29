<?php

namespace App\Http\Controllers;
use App\regulate;
use App\brand;
use Illuminate\Http\Request;

class RegulateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $regu_name = request()->regu_name??'';
        $where = [];

            $where[] =['regu_name','like',"%$regu_name%"];

        $pagesize = config('app.pagesize');
        $res = regulate::leftjoin("brand",'regulate.b_id','=','brand.b_id')->where($where)->paginate($pagesize);
        return view('regulate/list',['res'=>$res,'regu_name'=>$regu_name]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = brand::all();
        return view("regulate/index",['data'=>$data]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        $data['numbers']=rand(0,999999);
        if (isset($data['regu_img'])) {
            $photo = Moveupload('regu_img');
            // dd($data);
            $data['regu_img'] = implode('|',$photo);

          }
        $res = regulate::create($data);
        if($res){
            return redirect('regulate/index');
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
        $res=regulate::destroy($id);
        if($res){
           echo json_encode(['code'=>'00000','msg'=>'ok']);
        }
    }
}
