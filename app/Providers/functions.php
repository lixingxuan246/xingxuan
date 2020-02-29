<?php

/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function showMsg($status,$message = '',$data = array()){
    $result = array(
        'status' => $status,
        'message' =>$message,
        'data' =>$data
    );
    exit(json_encode($result));
}


   function CreateTree($data,$parent_id=0,$level=1){
        if(!$data){
            return;
        }
        static $newarray=[];
        foreach($data as $k=>$v){
            if($v->parent_id==$parent_id){
                $v->level=$level;
                $newarray[]=$v;

            //调用自身
            CreateTree($data,$v->c_id,$level+1);
        }
    }
    return $newarray;

    }
        //多文件上传
     function Moveupload($filename){
        $photo = request()->file($filename);
        if(!is_array($photo)){
            return;
        }
        foreach($photo as $v){
            if($v->isValid()){
                $store_result[] = $v->store('uploads');
            }
        }
        return $store_result;
    }

 function upload($filename){
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