<?php

namespace App\Http\Controllers;

use App\Models\Allclassdb;
use App\Models\Sub_teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    protected $classAttendB;
    protected $classAttendance;

    function fetch_class_sub(){
        $attendance_class= Allclassdb::select('className', 'class_attendence','classdb')
        ->where('className', 'like', 'Class%')->orderBy('className')->get();
        return view('components/attendanceStudent', compact('attendance_class'));
    }
    function selectSubject(Request $request){
        $class= $request->classOpt;
        $this->classAttendance= $request->classAttendance;
        // $request->session()->put('class_name_att', $this->classAttendance);
        $regno= session()->get('regno');
        $date = Carbon::today('Asia/Kolkata');
        $weekname= $date->format('l');
        // echo $weekname;
        if($weekname != 'Sunday'){
            $subjectName= Sub_teacher::select('sub_teacher.sub_name')
                        ->join('new_time_tables', function($join) use ($weekname)
                        {
                            $join->on('new_time_tables.class_name','=','sub_teacher.classNameSub')
                            ->on("new_time_tables.$weekname",'=','sub_teacher.sub_name');
                        })
                        ->where('sub_teacher.classNameSub', '=', "$class")->where('sub_teacher.regno_teach', '=', "$regno")->orderBy('sub_name')->get();
            return view('components/selectOption', compact('subjectName'));               
        }
        else{
            $data['error']= '<div class="alert alert-danger " role="alert"><b>No Class Today</b></div>';
            return response()->json($data);
        }
        // $count_sub= $subjectName->groupBy('sub_name')->map(function ($row) {
        //     return $row->count();
        // });
        // echo $count_sub['English'];
        // echo '<pre>';
        // print_r($subjectName);
    }
    function searchAttendance(Request $request){
        $class= $request->classOption;
        $classAttendB= $request->classAttendanceName;
        $classAttendBNew= substr($classAttendB, 0, -2);
        $class_attendance=  $classAttendBNew.'_attendence';
        $subject= $request->subjectName;
        $regno= session()->get('regno');
        if(!empty($class) && !empty($classAttendB) && !empty($subject)){{
            if (DB::table($classAttendB)->exists()) {
                $dt = Carbon::now('Asia/Kolkata');
                $check_today_attend= DB::table($class_attendance)->where('attendence_date','LIKE',$dt->format('Y-m-d').'%')
                                    ->where('sub_name', '=', $subject)->first();

                if(!$check_today_attend){
                    $table= DB::table($classAttendB)->
                            select('registrationNo', 'Name', 'fatherName', 'phoneNo')->orderBy('Name')->get(); 
                    return view('components/attendanceTable', compact('table', 'classAttendBNew', 'subject'));
                }
                else{
                    echo '<div class="alert alert-danger " role="alert">You have already taken the Attendance of <b>'.$class.'</b></div>';
                }
                // echo '<pre>';
                // print_r($table->toArray()); 
            }
        }}
    }
    function submitAttendanceFunction(Request $request){
        $class_name= $request->class_of_attend.'_attendence';
        $sub_name= $request->class_sub_name;
        $dt = Carbon::now('Asia/Kolkata');
        // echo $dt->format('Y-m-d H:i:s').'<br>';
        if($request->attendedClass){
            $absenties= array();
            foreach($request->attendedClass as $key){
                $str_arr = explode (",", $key);
                if ($str_arr[2] == 0) {
                    array_push($absenties, $str_arr[1]);
                }
                if(count($str_arr) == 3){
                    $regno= session()->get('regno');
                    $data = array(
                        'registrationNo' => $str_arr[0],
                        'registrNo_teacher' => $regno,
                        'attendence_date' => $dt->format('Y-m-d H:i:s'),
                        'sub_name' => $sub_name,
                        'attendence_status' => ($str_arr[2]) == 1 ? 'P' : 'A'
                    );
                    DB::table($class_name)->insert($data);
                    // echo '<pre>';
                    // print_r($data);
                    // echo '<br>';
                }
            }
            echo "<script type = 'text/javascript'> alert('Attendance Submitted Successfully!'); history.go(-1);</script>";
        }
        else{
            echo "<script type = 'text/javascript'>alert('Mark the attendance!'); history.back();</script>";
        }
    }
}
