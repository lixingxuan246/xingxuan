<?php

namespace App\Http\Controllers\Index;
use App\login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AlibabaCloud\Client\AlibabaCloud;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index/reg');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = request()->except('_token');
        //判断验证码
        if($data['pwd'] != $data['pwds']){
            return redirect('register');
        }
        $res = login::create($data);
        if($res){
            return redirect('/');
        }
    }


       public function ajaxsend(){

        $moblie = request()->moblie;
        $code = rand(00000,99999);
        $res = $this->sendSms($moblie,$code);
       if($res['Code']=='OK'){
session(['code'=>$code]);
            request()->session()->save();

            echo json_encode(['code'=>'00000','msg'=>'ok']);die;


       }
            echo json_encode(['code'=>'00001','msg'=>'短信发送失败']);die;
          }



   public function sendSms($moblie,$code){



// Download：https://github.com/aliyun/openapi-sdk-php
// Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

AlibabaCloud::accessKeyClient('LTAI4FjtyBknhUTkf9DyvWfN', 'MJ2jRGuhxn5kguD4H73tXSX0mrGf5t')
                        ->regionId('cn-hangzhou')
                        ->asDefaultClient();

  try {
    $result = AlibabaCloud::rpc()
                          ->product('Dysmsapi')
                          // ->scheme('https') // https | http
                          ->version('2017-05-25')
                          ->action('SendSms')
                          ->method('POST')
                          ->host('dysmsapi.aliyuncs.com')
                          ->options([
                                        'query' => [
                                          'RegionId' => "cn-hangzhou",
                                          'PhoneNumbers' => $moblie,
                                          'SignName' => "星星闪",
                                          'TemplateCode' => "SMS_181200828",
                                          'TemplateParam' => "{code:$code}",
                                        ],
                                    ])
                          ->request();
    return $result->toArray();
} catch (ClientException $e) {
    return $e->getErrorMessage();
} catch (ServerException $e) {
    return $e->getErrorMessage();
}

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
    }
}
