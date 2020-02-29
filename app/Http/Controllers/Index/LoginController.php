<?php

namespace App\Http\Controllers\Index;
use App\login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index/login');

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
        $where=[
            ['username','=',$data['username']],
            ['pwd','=',md5(md5($data['pwd']))],

        ];
        $res = login::where($where)->first();
        if($res){
            return redirect('');
        }
    }


    public function cookie(){
        // $cookie = cookie('pwd','李',2);
        // Cookie::queue(Cookie::make('age','18',2));
        return response('测试产生cookie')->cookie('name','李',5);
        return redirect('/qu');
    }
    public function qu(){
        echo request()->cookie('name');
        // $value = Cookie::get('pwd');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //LTAI4FjtyBknhUTkf9DyvWfN   MJ2jRGuhxn5kguD4H73tXSX0mrGf5t
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function ajaxsend(){
        $moblie = '18435917976';
        $code = rand(00000,99999);
        $this->sendSms($moblie,$code);
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
}
