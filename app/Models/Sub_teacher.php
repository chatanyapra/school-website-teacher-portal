<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Allclassdb;

class Sub_teacher extends Model
{
    use HasFactory;
    protected $table= 'sub_teacher';
    protected $regno= 'regno_teach';
    protected $class_name_sub= 'classNameSub';
}
