<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasTranslations;
    public $translatable = ['name'];

    protected $guarded=[];

    use HasFactory;

        // جلب اسم المراحل الدراسية
        // To get the Grade name
        public function grade()
        {
            return $this->belongsTo(Grade::class, 'grade_id');
        }
    
        // جلب اسم الصفوف الدراسية
        // To get the Classroom name
        public function classroom()
        {
            return $this->belongsTo(Classroom::class, 'classroom_id');
        }
    
        // جلب اسم المعلم
        // To get the Teacher name
        public function teacher()
        {
            return $this->belongsTo(Teacher::class, 'teacher_id');
        }
}
