<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tbl_checking;
use App\Models\tbl_staff;
use App\Models\tbl_user;
use Carbon\Carbon;
use DateTime;

class timekeepingController extends Controller
{
    public function add(Request $request){


try {
      $user = tbl_user::where('name',$request->us_name)->where('pass',MD5($request->us_pass))->first();
      $tbl_staff = tbl_staff::where('staff_code',$request->id_staff)->first();
      $tbl_checking_date = tbl_checking::whereDate('date_check','=', Carbon::today())->where('id_staff',$tbl_staff->id)->get();

      if($user){
            if(count($tbl_checking_date) == 0){
                $tbl_count = tbl_checking::get();
                $count = $tbl_count->count();
                $tbl_checking = new tbl_checking();
                $tbl_checking->stt = $count+1;
                $tbl_checking->note = $request->note;
                $tbl_checking->id_staff = $tbl_staff->id;
                $tbl_checking->save();
                return response()->json([
                  'code'=>'200',
                  'message' => 'CheckIn completed'
                ]);
              }else{
                return response()->json([
                  'code'=>'205',
                  'test' => Carbon::today(),
                  'message' => 'Your already checking today'
                ]);
          }

    }
    else
      {
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

  public function update(Request $request){

      $user = tbl_user::where('name',$request->us_name)->where('pass',MD5($request->us_pass))->first();
      $tbl_staff = tbl_staff::where('staff_code',$request->id_staff)->first();
      $tbl_checking_in = tbl_checking::whereDate('date_check','=', Carbon::today())->where('id_staff',$tbl_staff->id)->where('status',0)->get();
      $tbl_checking_out = tbl_checking::whereDate('date_check','=', Carbon::today())->where('id_staff',$tbl_staff->id)->where('status',1)->get();
      try {
        if($user){

          if(count($tbl_checking_out) == 0 && count($tbl_checking_in) == 1){
              $tbl_count = tbl_checking::get();
              $count = $tbl_count->count();
              $tbl_checking = new tbl_checking();
              $tbl_checking->stt = $count+1;
              $tbl_checking->note = $request->note;
              $tbl_checking->id_staff = $tbl_staff->id;
              $tbl_checking->status = 1;
              $tbl_checking->save();
              return response()->json([
                'code'=>'200',
                'message' => 'CheckIn completed'
              ]);
            }elseif (count($tbl_checking_out) == 1 && count($tbl_checking_in) == 1){

              $tbl_update = tbl_checking::whereDate('date_check','=', Carbon::today())->where('id_staff',$tbl_staff->id)->where('status',1)->first();
              $tbl_update->note = $request->note;
              $tbl_update->save();

              return response()->json([
                'code'=>'205',
                'test' => Carbon::today(),
                'message' => 'Cập nhật Ghi Chú Thành Công'
              ]);
        }else{
          return response()->json([
            'code'=>'208',
            'message' => 'Vui lòng Chấm công vào trước ! ! !'
          ]);
        }
      }
  } catch (\Exception $e) {
    return response()->json([
      'code'=>'406',
      'message' => 'Error'
    ]);
  }
  }

  public function checkcheckin(Request $request){

    $user = tbl_user::where('name',$request->us_name)->where('pass',MD5($request->us_pass))->first();
    $tbl_staff = tbl_staff::where('staff_code',$request->id_staff)->first();
    $tbl_checking_date = tbl_checking::whereDate('created_at', Carbon::today())->where('id_staff',$tbl_staff->id)->get();

try {
    if($user)
    {
        if(count($tbl_checking_date) == 0)
        {
              return response()->json([
                'code'=>'200',
                'message' => 'OK'
              ]);
        }
        else
        {
              return response()->json([
                'code'=>'205',
                'message' => 'No'
              ]);
        }

  }
  else
    {
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

  public function update_note(Request $request){

        $user = tbl_user::where('name',$request->us_name)->where('pass',MD5($request->us_pass))->first();
        $tbl_staff = tbl_staff::where('staff_code',$request->id_staff)->first();
        try {
        if($user){
          $tbl_checking = tbl_checking::where('id_staff',$tbl_staff->id)->orderby('date_check','desc')->first();
          $tbl_checking->note = $request->note;
          $tbl_checking->save();
          return response()->json([
            'code'=>'200',
            'message ' => 'update note completed'
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


  public function delete(Request $request){
          $user = tbl_user::where('name',$request->us_name)->where('pass',MD5($request->us_pass))->first();
          $tbl_staff = tbl_staff::where('staff_code',$request->id_staff)->first();
          try {
          if($user){
            $tbl_checking = tbl_checking::where('id_staff',$tbl_staff->id)->orderby('date_check','desc')->first();
            $tbl_checking->delete();
            return response()->json([
              'code'=>'200',
              'message ' => 'deleted'
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
}
