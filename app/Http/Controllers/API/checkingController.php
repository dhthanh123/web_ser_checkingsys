<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validation;
use App\Models\tbl_checking;
use App\Models\tbl_user;
use App\Http\Resources\checkingResource;
use App\Models\tbl_staff;

class checkingController extends Controller
{

   public function checking(Request $request){
     $user = tbl_user::where('name',$request->us_name)->where('pass',MD5($request->us_pass))->first();
     $checking_count = tbl_checking::orderby('stt')->get();
     $tbl_staff = tbl_staff::where('staff_code',$request->id_staff)->first();
     try {
       if($user){
         $checking = new tbl_checking();
         $checking->stt = count($checking_count);
         $checking->id_staff = $tbl_staff->id;
         $checking->temperature = $request->temperature;         
         $checking->save();
         return response()->json([
           'code'=>'200',
           'message' => 'add completed'
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
