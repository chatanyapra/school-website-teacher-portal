<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sub_teacher;

class Allclassdb extends Model
{
    use HasFactory;
    protected $table = "allclassdb";
    protected $primarykey= 'Sno';
    protected $class_name= 'className';

    function getSub_teacher(){
        return $this->hasMany('App\Models\Sub_teacher', 'classNameSub', 'className');
    }
}
