<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teachersdb;
use App\Models\New_time_tables;
use Illuminate\Support\Carbon;
use App\Traits\Common;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Teacherlogincontroller extends Controller
{
    use Common;
    function teacherlogindata(Request $request){
        
        $request->validate([
            'registrationNo'=>'required',
            'password'=>'required'
        ]);
        if($request->errors ==0){
            $regno= $request['registrationNo'] ?? ""; 
            $password= $request['password'] ?? "";
            if($regno != "" && $password != ""){
                $result= Teachersdb::where([['registrationNo', '=', $regno], ['password', '=', $password]])->exists(
                    $search = Teachersdb::select('teachersdb.*', 'sub_teacher.*')
                            ->join('sub_teacher','sub_teacher.regno_teach','=','teachersdb.registrationNo')
                            ->where('teachersdb.registrationNo', '=' ,$regno)->get()
                        );
                if($result){
                    $request->session()->put('regno',$request['registrationNo']);
                    $request->session()->put('pass',$request['password']);
                        $date= $this->currentDate();
                        $lecturetime= $this->lectures_time($regno);
                        
                        $message= $this->newmessageboxfunction();

                        $selectSub= $this->selectSubClass();
                        // $selectClass_attend= 
                        // print_r($lectureAttend);
                        // print_r(session()->all());
                        return view('teacherhomepage', compact('search', 'date', 'lecturetime', 'message', 'selectSub'));
                }
                else{
                    return view('teacherlogin')->with('wrong', "Wrong Registration no or Password");
                }
            }
        }
    }

    function dashboard_func(){
        $regno= session()->get('regno'); 
            $search= Teachersdb::where('registrationNo', '=', $regno)->get();
            $date= $this->currentDate();
            $lecturetime= $this->lectures_time($regno);
            $message= $this->newmessageboxfunction();
            $selectSub= $this->selectSubClass();
            // echo '<pre>';
            // print_r($lecturetime);
            return view('components/dashboard', compact('search', 'date', 'lecturetime', 'message', 'selectSub'));
    }

    function currentDate(){
        $date = Carbon::today('Asia/Kolkata');
        $dayWeek= $date->format('l');
        $dte= $date->format('jS');
        $month= $date->format('F');
        $year= $date->format('Y');
        $time= $date->format('h:i A');
        return array('dat'=> $dte, 'week'=> $dayWeek, 'month'=> $month, 'year'=> $year, 'time'=> $time);
    }

    function lectures_time($regno){
        $wek= $this->currentDate();
        $weekname= $wek['week'];
        // echo $weekname;
        if(Schema::hasColumn('new_time_tables',$weekname)){
            $timetable= New_time_tables::select('sub_teacher.sub_name','sub_teacher.classNameSub','new_time_tables.Sno',
                        'new_time_tables.class_name','new_time_tables.periods',"new_time_tables.$weekname")
                        ->join('sub_teacher', function($join) use ($weekname)
                        {
                            $join->on('new_time_tables.class_name','=','sub_teacher.classNameSub')
                            ->on("new_time_tables.$weekname",'=','sub_teacher.sub_name');
                        })
                        ->where('sub_teacher.regno_teach', '=' ,$regno)->orderBy('new_time_tables.Sno', 'asc')->get();
        }
        else{
            $timetable= [['chetan' => 'None'],['chetan' => 'None']];
        }
                    
        return $timetable;
    }

    // ---------------------------<<<<<<<<<<<<<<<<<<<<<<<<
    function newmessageboxfunction(){
        $regno= session()->get('regno');
        $search1 = Teachersdb::select('teachersdb.messageBox')
                 ->where('teachersdb.registrationNo', '!=' ,$regno)->where('teachersdb.messageBox', '!=' ,'null')->get();
                 
                 return $search1;
     }
}


