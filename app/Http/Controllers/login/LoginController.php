<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * 展示视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('login');
    }

    /**
     * 登录执行
     * @param Request $request
     */
    public function login_do(Request $request)
    {
        $data = json_encode($request->input(),JSON_UNESCAPED_UNICODE);  //待加密的明文信息数据
        //对称加密
//        $method = "AES-256-CBC";
//        $key = "Admin123";
//        $options = OPENSSL_RAW_DATA;
//        $iv="12345tgvfred2346";
//        $arrInfo = openssl_encrypt($data,$method,$key,$options,$iv);

        //非对称加密
        $k=openssl_pkey_get_private('file://'.storage_path('app/key/private.pem'));
        openssl_private_encrypt($data,$enc_data,$k);

        $url = "http://lumen.1809a.com/loginDo";
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_POST,1);
//        curl_setopt($curl,CURLOPT_POSTFIELDS,$arrInfo);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$enc_data);
        curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:text/plain']);
        $res = curl_exec($curl);
        var_dump($res);
    }

    /**
     * 欢迎页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function wel()
    {
        return view('wel');
    }
}