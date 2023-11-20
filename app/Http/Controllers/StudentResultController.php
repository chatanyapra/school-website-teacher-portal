<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_teacher;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StudentResultController extends Controller
{
    function fetch_result_page(){
        $regno= session()->get('regno');
        $subjectSelect= Sub_teacher::select('classNameSub')->where('regno_teach', '=', $regno)->distinct()->get();
        return view('components/studentSearchResult', compact('subjectSelect'));
    }
    function fetch_result_Subject(Request $request){
        $regno= session()->get('regno');
        $subjectName= Sub_teacher::select('sub_name')->where('regno_teach', '=', $regno)
                        ->where('classNameSub', '=', $request->selectClass)->get();
        return view('components/selectOption', compact('subjectName'));
    }
    function search_result_student(Request $request){
        $subject= $request->selectSubject;
        $examType= $request->selectExamType;
        $classname= strtolower(str_replace('-', '_', $request->selectClass)).'db';
        $resultTable= str_replace('db', 'result',$request->className);
        if (Schema::hasTable($classname)){
            $result= DB::table($classname)->select('registrationNO', 'Name', 'fatherName')->orderBy('registrationNO')->get();
            return view('components/studentResult', compact('subject', 'result', 'classname', 'examType'));
        }
        // print_r($result->toArray());
    }
    function submit_result_marks(Request $request){
        $resultTable= str_replace('db', 'result',$request->className);
        if (DB::table('allclassdb')->where('classdb', '=', $request->className)->exists()){
            if(!Schema::hasTable($resultTable)){
                $this->createTable($resultTable);
            }
            $subname= $request->subject_name;
            $new_subject = explode (",", $subname);
            $examType= $new_subject[1];
            $sub= $new_subject[0];
            if (!Schema::hasColumn($resultTable, $sub)){
                Schema::table($resultTable ,  function (Blueprint $table) use ($sub) {
                    $table->integer($sub)->default(0);
                });
            }
            $i=0;
            foreach ($request->regnonumber as $key) {
                $data = array(
                    'student_regno' => $key, 
                    'exam_type' => $examType, 
                    $sub => $request->marksStudent[$i]
                );
                DB::table($resultTable)->updateOrInsert(['student_regno' => $key, 'exam_type' => $examType],$data);
                $i++;
            }
            echo "<script type = 'text/javascript'> alert('Result Submitted Suc cessfully!'); history.go(-1);</script>";
        }
    }
    function createTable($tablename){
        $fields= [
            ['name' => 'student_regno', 'type' => 'integer'],
            ['name' => 'exam_type', 'type' => 'string']
        ];
        Schema::create($tablename, function(Blueprint $table) use($fields){
            $table->increments('Sno');
            if(count($fields) > 0){
                foreach($fields as $field){
                    $table->{$field['type']}($field['name']);
                }
                echo 'ook';
            }
        });
    }
}
