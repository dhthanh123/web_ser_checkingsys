<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\tbl_user;

class accountController extends Controller
{
    public function getList(){
      $user = tbl_user::orderby('stt')->get();
      return view('Admin.Account.List',['user'=>$user]);
    }

    public function getAdd(){
      return view('Admin.Account.Add');
    }

    public function postAdd(Request $request){

      $tbl_user = new tbl_user();
      $tbl_user->stt = $request->stt;
      $tbl_user->name = $request->us_name;
      $tbl_user->pass = MD5($request->us_pass);
      $tbl_user->email = $request->email;
      $tbl_user->role = $request->role;
      $tbl_user->save();
      return redirect('/admin/account/list.html')->with('alert','Thêm thành công');
    }

    public function getEdit($id){
      $tbl_user = tbl_user::find($id);
      return view('Admin.Account.Edit',['user' => $tbl_user]);
    }

    public function postEdit(Request $request, $id){
      $tbl_user = tbl_user::find($id);
      $tbl_user->stt = $request->stt;
      $tbl_user->name = $request->us_name;
      if($request->us_pass != null)
        $tbl_user->pass = MD5($request->us_pass);
      $tbl_user->email = $request->email;
      $tbl_user->role = $request->role;
      $tbl_user->save();
      return redirect('/admin/account/list.html')->with('alert','Cập nhật thành công');
    }

    public function delete($id){
      $tbl_user = tbl_user::find($id);
      $tbl_user->delete();
      return redirect('/admin/account/list.html')->with('alert','Xóa thành công');
    }

}
