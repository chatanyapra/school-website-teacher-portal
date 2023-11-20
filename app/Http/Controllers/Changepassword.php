<?php

namespace App\Http\Controllers;
use App\Models\Teachersdb;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Changepassword extends Controller
{
    function checkValueChangepass(Request $request){
        if($request->all() != ""){
            $regno = "";
            $passval= $request->passValue;
            $newpassval=  $request->newPassVal;
            $oldpassval=  $request->oldPassVal;
            if($request->passValue == $request->newPassVal){
                if (session()->has('regno') && $request->oldPassVal != "") {
                    $regno= session()->get('regno'); 
                    $search= Teachersdb::where([['registrationNo', '=', $regno], ['password', '=', $oldpassval]])->exists();
                    if($search ==1  ){
                        DB::update('update teachersdb set password = ? where registrationNo = ?',
                        [$passval,$regno]);
                        return "<span style='color: green;'>* Password updated successfully.</span>";
                    }
                    else{
                        return '* Wrong Registration no or Password';
                    }
                }
            }
            else{
                return "* New and Confirm password are not matching";
            }
        }
    }
    function logoutuser(Request $req){
        $req->session()->flush();
        $req->session()->forget(['regno', 'pass']);
        echo "<script type = 'text/javascript'> window.location.replace('/teacherlogin/home')</script>";
    }
}
