<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allclassdb;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegistrationController extends Controller
{
    function registrationPage_fetch(){
        $classNameAll= Allclassdb::select('className', 'classdb')->get();
        return view('components/studentRegistration', compact('classNameAll'));
    }
    function submitRegistration(Request $request){
        $file= $request->photoUpload;
        if($request->photoUpload->getSize() <= 102400){
            $extension= strtolower($request->photoUpload->getClientOriginalExtension());
            $ext = array("jpg", "jpeg", "pdf");
            if (in_array($extension, $ext)) {
                $path= $file->store('photoUpload');
                if(Schema::hasTable($request->loginClassSelect)){
                    $inserted= DB::table($request->loginClassSelect)->insert(
                        array(
                            'registrationNO' => $request->regist_no, 
                            'password'   =>   $request->pass_reg,
                            'Name'   =>   $request->studentName,
                            'photo'   =>   $path,
                            'fatherName'   =>   $request->fatherName,
                            'Email'   =>   $request->studentEmail,
                            'phoneNo'   =>   $request->phoneNo
                        )
                    );
                    if($inserted){
                        echo "<script type = 'text/javascript'>alert('Registration has been successful!'); history.back();</script>";
                    }
                }
            }
            else{
                echo "<script type = 'text/javascript'>alert('Choose the correct extension('jpg', 'jpeg', 'pdf') of photo!'); history.go(-1);</script>";
            }
        }
        else{
            echo "<script type = 'text/javascript'>alert('Size of image is large then 2MB!'); history.go(-1);</script>";
        }
    }
    function select_last_data(Request $request){
        if($request->className){
            $result= DB::table($request->className)->select('registrationNO')->orderBy('Sno', 'desc')->first();
            if($result){
                $data['regno']= $result->registrationNO+1;
            }
            else{
                $data['error']= 'Enter first registration number';
            }
            $data['pass']=  Str::random(5);
            return response()->json($data);
        }
    }
}
