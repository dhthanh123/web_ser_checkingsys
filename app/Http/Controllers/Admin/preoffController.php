<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_staff;
use App\Models\tbl_reason;
use App\Models\tbl_preoff;
use Carbon\Carbon;

class preoffController extends Controller
{
  public function getList(){
    $tbl_preoff = tbl_preoff::orderby('stt')->get();
    $tbl_reason = tbl_reason::orderby('stt')->get();
    $tbl_staff = tbl_staff::orderby('stt')->get();
    return view('Admin.preoff.List',['preoff'=>$tbl_preoff,'reason' => $tbl_reason,'staff' => $tbl_staff]);
  }

  public function getAdd(){
    #$tbl_preoff = tbl_preoff::orderby('stt')->get();
    $tbl_reason = tbl_reason::orderby('stt')->get();
    $tbl_staff = tbl_staff::orderby('stt')->get();

    return view('Admin.preoff.Add',['reason' => $tbl_reason,'staff' => $tbl_staff]);
  }

  public function postAdd(Request $request){

    $tbl_preoff = new tbl_preoff();
    $tbl_preoff->stt = $request->stt;
    $tbl_preoff->id_staff = $request->id_staff;
    $tbl_preoff->id_reason = $request->id_reason;
    $tbl_preoff->date =   Carbon::createFromFormat('d/m/Y',$request->date)->format("Y/m/d");
    $tbl_preoff->save();
    return redirect('/admin/preoff/list.html')->with('alert','Thêm thành công');
  }

  public function getEdit($id){

    $tbl_preoff = tbl_preoff::find($id);
    $tbl_staff = tbl_staff::orderby('stt')->get();
    $tbl_reason = tbl_reason::orderby('stt')->get();

    return view('Admin.preoff.Edit',['staff' => $tbl_staff, 'reason' => $tbl_reason, 'preoff' => $tbl_preoff]);
  }

  public function postEdit(Request $request, $id){

    $tbl_preoff = tbl_preoff::find($id);
    $tbl_preoff->stt = $request->stt;
    $tbl_preoff->id_staff = $request->id_staff;
    $tbl_preoff->id_reason = $request->id_reason;
    $tbl_preoff->date =   Carbon::createFromFormat('d/m/Y',$request->date)->format("Y/m/d");
    $tbl_preoff->save();
    return redirect('/admin/preoff/list.html')->with('alert','Cập nhật thành công');
  }

  public function delete($id){
    $tbl_preoff = tbl_preoff::find($id);
    $tbl_preoff->delete();
    return redirect('/admin/preoff/list.html')->with('alert','Xóa thành công');
  }
}
