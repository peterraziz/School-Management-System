<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasTranslations;
    public $translatable = ['title'];

    protected $guarded=[];

    use HasFactory;


    // علاقة بين الرسوم الدراسية والمراحل الدراسية لجلب اسم المرحلة 
    // Relation between Fees and Grades to get the Grade name in Fees table
    public function grade(){
        return $this->belongsTo(Grade::class, 'Grade_id');
    }


    // علاقة بين الرسوم الدراسية والصفوف الدراسية لجلب اسم المرحلة 
    // Relation between Fees and Classrooms to get the Classroom name in Fees table
    public function classroom(){
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }


}
