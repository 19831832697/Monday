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
    public function login_do(Request $request)
    {
        $user_name = $request->input('user_name');
        $user_pwd = $request->input('user_pwd');
        
    }
}
