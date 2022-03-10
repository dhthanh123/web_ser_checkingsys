<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_staff;
use App\Models\tbl_room;
use Carbon\Carbon;
use DateTime;

class staffController extends Controller
{
  public function getList(){
    $tbl_staff = tbl_staff::orderby('stt')->get();
    $tbl_room = tbl_room::orderby('stt')->get();
    return view('Admin.Staff.List',['staff'=>$tbl_staff,'room' => $tbl_room]);
  }

  public function getAdd(){
    $tbl_room = tbl_room::orderby('stt')->get();
    return view('Admin.Staff.Add',['room' => $tbl_room]);
  }

  public function postAdd(Request $request){

    $tbl_staff = new tbl_staff();
    $tbl_staff->stt = $request->stt;
    $tbl_staff->staff_code = $request->code;
    $tbl_staff->name = $request->name;
    $tbl_staff->birthday = Carbon::createFromFormat('d/m/Y',$request->birthday)->format("Y/m/d");
    $tbl_staff->phone = $request->phone;
    $tbl_staff->id_room = $request->id_room;
    $tbl_staff->save();
    return redirect('/admin/staff/list.html')->with('alert','Thêm thành công');
  }

  public function getEdit($id){
    $tbl_staff = tbl_staff::find($id);
    $tbl_room = tbl_room::orderby('stt')->get();
    return view('Admin.Staff.Edit',['staff' => $tbl_staff, 'room' => $tbl_room]);
  }

  public function postEdit(Request $request, $id){
    $tbl_staff = tbl_staff::find($id);
    $tbl_staff->stt = $request->stt;
    $tbl_staff->staff_code = $request->code;
    $tbl_staff->name = $request->name;
    $tbl_staff->birthday = Carbon::createFromFormat('d/m/Y',$request->birthday)->setTime(0,0)->format('Y/m/d');
    $tbl_staff->phone = $request->phone;
    $tbl_staff->id_room = $request->id_room;
    $tbl_staff->save();
    return redirect('/admin/staff/list.html')->with('alert','Cập nhật thành công');
  }

  public function delete($id){
    $tbl_staff = tbl_staff::find($id);
    $tbl_staff->delete();
    return redirect('/admin/staff/list.html')->with('alert','Xóa thành công');
  }
}
