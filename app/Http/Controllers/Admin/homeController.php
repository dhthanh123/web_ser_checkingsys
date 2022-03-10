<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\tbl_staff;
use App\Models\tbl_checking;
use Carbon\Carbon;

class homeController extends Controller
{
    public function getHome(){
      $tbl_staff = tbl_staff::orderby('stt')->get();
      $tbl_checking = tbl_checking::orderby('stt')->get();
      return view('Admin.Report.main',['staff' => $tbl_staff,'checking' => $tbl_checking]);
    }

    public function logout(){
      session:flush();
      return redirect('/');
    }
}
