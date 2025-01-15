<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $guarded=[]; // All the Columns

    use HasFactory;

// Relations from promotion table 

    // علاقة بين الترقيات والأنواع لجلب اسم أسم النوع في جدول الترقيات
    // Relation between Promotions and Genders to get the Gender name in Promotions table
    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب أسم المرحلة في جدول الترقيات
    // Relation between Promotions and Grades to get the Grade name in Promotions table
    public function from_grade_(){
        return $this->belongsTo(Grade::class, 'from_grade');
    }

    // علاقة بين الترقيات والصفوف لجلب أسم الصف في جدول الترقيات
    // Relation between Promotions and Classrooms to get the Classroom name in Promotions table
    public function from_classroom_(){
        return $this->belongsTo(Classroom::class, 'from_Classroom');
    }

    // علاقة بين الترقيات والأقسام لجلب اسم القسم في جدول الترقيات
    // Relation between Promotions and sections to get the section name in Promotions table
    public function from_section_(){  
        return $this->belongsTo(Section::class, 'from_section');
    }


//           To ============

    public function to_grade_(){
        return $this->belongsTo(Grade::class, 'to_grade');
    }

    // علاقة بين الترقيات والصفوف لجلب أسم الصف في جدول الترقيات
    // Relation between Promotions and Classrooms to get the Classroom name in Promotions table
    public function to_Classroom_(){
        return $this->belongsTo(Classroom::class, 'to_Classroom');
    }

    // علاقة بين الترقيات والأقسام لجلب اسم القسم في جدول الترقيات
    // Relation between Promotions and sections to get the section name in Promotions table
    public function to_section_(){  
        return $this->belongsTo(Section::class, 'to_section');
    }

}
