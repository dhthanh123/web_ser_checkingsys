<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_reason;

class reasonController extends Controller
{
  public function getList(){
    $tbl_reason = tbl_reason::orderby('stt')->get();
    return view('Admin.Reason.List',['reason'=>$tbl_reason]);
  }

  public function getAdd(){
    return view('Admin.Reason.Add');
  }

  public function postAdd(Request $request){

    $tbl_reason = new tbl_reason();
    $tbl_reason->stt = $request->stt;
    $tbl_reason->name = $request->name;
    $tbl_reason->salary = $request->salary;
    $tbl_reason->save();
    return redirect('/admin/reason/list.html')->with('alert','Thêm thành công');
  }

  public function getEdit($id){
    $tbl_reason = tbl_reason::find($id);
    return view('Admin.Reason.Edit',['reason' => $tbl_reason]);
  }

  public function postEdit(Request $request, $id){
    $tbl_reason = tbl_reason::find($id);
    $tbl_reason->stt = $request->stt;
    $tbl_reason->name = $request->name;
    $tbl_reason->salary = $request->salary;
    $tbl_reason->save();
    return redirect('/admin/reason/list.html')->with('alert','Cập nhật thành công');
  }

  public function delete($id){
    $tbl_reason = tbl_reason::find($id);
    $tbl_reason->delete();
    return redirect('/admin/reason/list.html')->with('alert','Xóa thành công');
  }
}
