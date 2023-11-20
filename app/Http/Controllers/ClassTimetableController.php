<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allclassdb;
use App\Models\New_time_tables;
use App\Models\Sub_teacher;
use Illuminate\Support\Facades\DB;

class ClassTimetableController extends Controller
{
    function fetch_timetable_page(){
        $classNameAll= Allclassdb::select('className')->where('className', 'like', 'Class%')
        ->orderBy('Sno')->get();
        return view('components/classesManage', compact('classNameAll'));
    }
    function time_table_classwise(Request $request){
        $class_name= $request->className;
        $class_sub= Sub_teacher::select('sub_name')->where('classNameSub', '=', $class_name)->orderBy('sub_name')->get();
        $timetable= New_time_tables::select()->where('class_name', '=', $class_name)->orderBy('periods')->get();
        // echo '<pre>';
        // print_r($timetable);
        if($class_sub && $timetable){
            return view('components/timeTableClass', compact('timetable', 'class_sub', 'class_name'));
        }
        else{
            echo '<div class="alert alert-danger text-center" role="alert">No time table found!</div>';
        }
    }
    function changeTimingClasses(Request $request){
        // $time= date("g:iA", strtotime($request->timing." +1 hours"));
        if($request->timing){
            if (DB::table('new_time_tables')->where('class_name', '=', $request->className)->exists()){
                $classAvail= DB::table('new_time_tables')->where('class_name', '=', $request->className)->count();
                for($i = 1; $i <= $classAvail; $i++){
                    DB::table('new_time_tables')->where('class_name', '=', $request->className)->where('periods', '=', $i)
                    ->update(['time_sub'=> date("g:iA", strtotime($request->timing." +".($i-1)." hours"))]);
                }
                $data['success']= 'School Timing Updated Successfully!';
            }
            else{
                $data['error']= $request->className.' does not exist!';
            }
            return response()->json($data);
        }
    }
    function submit_new_timetable(Request $request){
        $class_name_table=  $request->class_name_table;
        $num= 1;
        if (DB::table('new_time_tables')->where('class_name', '=', $class_name_table)->exists()){
            foreach ($request->mondaytable as $key) {
                $data= array(
                    'Monday' => $request->mondaytable[$num-1],
                    'Tuesday' => $request->tuesdaytable[$num-1],
                    'Wednesday' => $request->wednesdaytable[$num-1],
                    'Thursday' => $request->thursdaytable[$num-1],
                    'Friday' => $request->fridaytable[$num-1],
                    'Saturday' => $request->saturdaytable[$num-1]
                );
                DB::table('new_time_tables')->where('periods', '=', $num)->where('class_name', '=', $class_name_table)->update($data);
                $num++;
            }
            echo "<script type = 'text/javascript'> alert('Time Table Updated Successfully!'); history.go(-1);</script>";
        }
        elseif(DB::table('allclassdb')->where('className', '=', $class_name_table)->exists()){
            $no= 1;
            foreach ($request->mondaytable as $key) {
                $data= array(
                    'class_name' => $class_name_table,
                    'periods' => $no,
                    'Monday' => $request->mondaytable[$no-1],
                    'Tuesday' => $request->tuesdaytable[$no-1],
                    'Wednesday' => $request->wednesdaytable[$no-1],
                    'Thursday' => $request->thursdaytable[$no-1],
                    'Friday' => $request->fridaytable[$no-1],
                    'Saturday' => $request->saturdaytable[$no-1]
                );
                DB::table('new_time_tables')->where('periods', '=', $no)->where('class_name', '=', $class_name_table)->insert($data);
                $no++;
            }
            echo "<script type = 'text/javascript'> alert('Time Table Inserted Successfully!'); history.go(-1);</script>";
        }
    }
}
