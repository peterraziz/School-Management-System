<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Authenticatable
{
    use SoftDeletes;
    
    use HasTranslations;
    public $translatable = ['name']; 

    protected $guarded=[]; // All the Columns

    use HasFactory;

    // علاقة بين الطلاب والأنواع لجلب أسم النوع في جدول الطلاب
    // Relation between Students and Genders to get the Gender name in Students table
    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم أسم المرحلة في جدول الطلاب
    // Relation between Students and Grades to get the Grade name in Students table
    public function grade(){
        return $this->belongsTo(Grade::class, 'Grade_id');
    }

    // علاقة بين الطلاب والصفوف لجلب اسم أسم الصف في جدول الطلاب
    // Relation between Students and Classrooms to get the Classroom name in Students table
    public function classroom(){
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }

    // علاقة بين الطلاب والأقسام لجلب اسم القسم في جدول الطلاب
    // Relation between Students and sections to get the section name in Students table
    public function section(){  
        return $this->belongsTo(Section::class, 'section_id');
    }
    
    // علاقة بين الطلاب والصور لجلب الصور في جدول الطلاب
    // Relation between Students and images to get the image in Students table
    public function images(){  
        return $this->morphMany(Image::class, 'imageable');
    }

    // علاقة بين الطلاب والجنسيات لجلب الجنسية في جدول الطلاب
    // Relation between Students and Nationalities to get the Nationality in Students table
    public function Nationality(){  
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }
    
    // علاقة بين الطلاب والآباء لجلب اسم الأب في جدول الطلاب
    // Relation between Students and Parents to get the Parent in Students table
    public function myparent(){  
        return $this->belongsTo(My_Parent::class, 'parent_id');
    }

    // علاقة بين الطلاب وسداد الطلاب لجلب اجمالي المدفوعات والمتبقي 
    // Relation between Students and student__accounts to get the Total Payments and remaining
    public function student_account(){  
        return $this->hasMany(Student_Account::class, 'student_id'); //student_id in student__accounts
    }

    // علاقة بين الطلاب والحضور والغياب 
    // Relation between Students and Attendance
    public function Attendance(){  
        return $this->hasMany(Attendance::class, 'student_id');
    } // hasMany cause the student will have many days

}
