<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\tbl_user;


class LoginController extends Controller
{
    public function getLogin()
    {
        return view('signin');
    }

    public function postLogin(Request $request)
    {
      $user = tbl_user::where('name', $request->us_name)->where('pass',MD5($request->us_pass))->first();
      if($user != null){
        session::put('user_name', $user->name);
        session::put('user_role', $user->role);
        return redirect('admin/home.html');
      }
      else
        return redirect('login.html')->with('alert', 'Tên đăng nhập hoặc mặt khẩu không chính xác vui lòng thử lại !!! ');

    }

    public function logout(){
      Session::flush();
      return redirect('login.html');
    }
}
