<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_room;

class roomController extends Controller
{
  public function getList(){
    $tbl_room = tbl_room::orderby('stt')->get();
    return view('Admin.Room.List',['room'=>$tbl_room]);
  }

  public function getAdd(){
    return view('Admin.Room.Add');
  }

  public function postAdd(Request $request){

    $tbl_room = new tbl_room();
    $tbl_room->stt = $request->stt;
    $tbl_room->name = $request->name;
    $tbl_room->save();
    return redirect('/admin/room/list.html')->with('alert','Thêm thành công');
  }

  public function getEdit($id){
    $tbl_room = tbl_room::find($id);
    return view('Admin.Room.Edit',['room' => $tbl_room]);
  }

  public function postEdit(Request $request, $id){
    $tbl_room = tbl_room::find($id);
    $tbl_room->stt = $request->stt;
    $tbl_room->name = $request->name;
    $tbl_room->save();
    return redirect('/admin/room/list.html')->with('alert','Cập nhật thành công');
  }

  public function delete($id){
    $tbl_room = tbl_room::find($id);
    $tbl_room->delete();
    return redirect('/admin/room/list.html')->with('alert','Xóa thành công');
  }
}
