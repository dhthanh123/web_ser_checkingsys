<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_staff;
use App\Models\tbl_user;

class staffController extends Controller{

  public function getStaffbyid(Request $request){
    $user = tbl_user::where('name',$request->us_name)->where('pass',MD5($request->us_pass))->first();
    try {
      if($user){
        $staff = tbl_staff::where('staff_code',$request->staff_code)->first();
        return response()->json([
          'code'=>'200',
          'name' => $staff->name,
          'staff_image' => $staff->url_image,
          'id' => $staff->id
        ]);
      }else{
        return response()->json([
          'code'=>'403',
          'message' => 'Forbidden, please! checking your user name and password again!!'
        ]);
      }
    } catch (\Exception $e) {
      return response()->json([
        'code'=>'406',
        'message' => 'Error'
      ]);
    }

  }

  public function gettest(){
    return response()->json([
      'code'=>'200',
      'message' => 'OK'
    ]);
  }

}
