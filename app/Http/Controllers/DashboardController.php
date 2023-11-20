<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teachersdb;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
   function messageboxfunction(Request $req){
      $text1= $req->inputval;
      $text= htmlentities($text1);
      if($text != "" && strlen($text) >=5 && strlen($text) <=100){
         $regno= session()->get('regno');

         $dt = Carbon::now('Asia/Kolkata');
         $time= $dt->format('d-M-Y-');
         $newtext=  $time." ".$text;

            DB::update('update teachersdb set messageBox = ? where registrationNo = ?',[$newtext,$regno]);
            echo "<span class='text-success'>$newtext</span>";
      }
      else{
         echo "<span class='text-danger'>Text length is valid between 5 to 100 <span>";
      }
   }
   function deleteThemessage(){
      $regno= session()->get('regno');
      DB::update('update teachersdb set messageBox = ? where registrationNo = ?',['',$regno]);
      echo ' *Deleted previous message';
   }
   function selectClass_attend(Request $req){
      $classname= $req->classOpt;
      $subject= $req->subOpt;
      $classname= strtolower(str_replace('-', '_', $classname)).'_attendence';
      // echo $classname;
      $regno= session()->get('regno');
      if (DB::table($classname)->where('registrNo_teacher', $regno)->exists()) {
          $count= DB::table($classname)->
                      where('registrNo_teacher', $regno)->
                      where('sub_name', $subject)->
                      selectRaw('count(registrNo_teacher) as cnt')->pluck('cnt');
                      echo $count[0];
      }
      else{
          echo "0";
      }
   }
}




// Teachersdb::select('teachersdb.*', 'sub_teacher.*')
//         ->join('sub_teacher','sub_teacher.regno_teach','=','teachersdb.registrationNo')
//         ->where('teachersdb.registrationNo', '=' ,$regno)->get();
// print_r($search);