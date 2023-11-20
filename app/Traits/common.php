<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

trait Common {

    public function selectSubClass(){
        $regno= session()->get('regno');
        $selectopt = DB::select('select classNameSub, sub_name from sub_teacher where regno_teach = ?',[$regno]);
        return $selectopt;
    }
}
// trait LectureAttend{
//     use Common;
//     public function selectClass_attend(Request $request){
//         echo $request->classOpt;
//         echo $request->subOpt;
//         // $regno= session()->get('regno');
//         // $selectopt = DB::select('select classNameSub, sub_name from sub_teacher where regno_teach = ?',[$regno]);
//         // return $selectopt;
//     }
// }

?>