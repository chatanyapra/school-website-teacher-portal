<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teachersdb extends Model
{
    use HasFactory;
    protected $table= 'teachersdb';
    protected $primarykey= 'registrationNo';
    protected $password= 'password';
}
// Teachersdb::select('teachersdb.*', 'sub_teacher.*')
//                                 ->join('sub_teacher','sub_teacher.regno_teach','=','teachersdb.registrationNo')
//                                 // ->join('allclassdb','allclassdb.class_teacher','=','teachersdb.registrationNo')
//                                 ->where('teachersdb.registrationNo', '=' ,$regno)->get();