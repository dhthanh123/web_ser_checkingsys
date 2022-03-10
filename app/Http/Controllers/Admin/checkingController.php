<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_staff;
use App\Models\tbl_checking;
use Carbon\Carbon;

class checkingController extends Controller
{
  public function getList(){
    $tbl_staff = tbl_staff::orderby('stt')->get();
    $tbl_checking = tbl_checking::orderby('stt')->get();
    return view('Admin.Checking.List',['checking' => $tbl_checking,'staff' => $tbl_staff]);
  }

  public function getAdd(){
    $tbl_staff = tbl_staff::orderby('stt')->get();
    return view('Admin.Checking.Add',['staff' => $tbl_staff]);
  }

  public function postAdd(Request $request){
    $tbl_checking = new tbl_checking();
    $tbl_checking->stt = $request->stt;
    $tbl_checking->id_staff = $request->id_staff;
    $tbl_checking->date_check = Carbon::createFromFormat('d/m/Y',$request->date_check)->format("Y/m/d");
    $tbl_checking->save();
    return redirect('/admin/checking/list.html')->with('alert','Thêm thành công');
  }

  public function getEdit($id){
    $tbl_staff = tbl_staff::orderby('stt')->get();
    $tbl_checking = tbl_checking::find($id);
    return view('Admin.Checking.Edit',['staff' => $tbl_staff, 'checking' => $tbl_checking]);
  }

  public function postEdit(Request $request, $id){
    $tbl_checking = tbl_checking::find($id);
    $tbl_checking->stt = $request->stt;
    $tbl_checking->id_staff = $request->id_staff;
    $tbl_checking->date_check = Carbon::createFromFormat('d/m/Y',$request->date_check)->format("Y/m/d");
    $tbl_checking->save();
    return redirect('/admin/checking/list.html')->with('alert','Cập nhật thành công');
  }

  public function delete($id){
    $tbl_checking = tbl_checking::find($id);
    $tbl_checking->delete();
    return redirect('/admin/checking/list.html')->with('alert','Xóa thành công');
  }
}
