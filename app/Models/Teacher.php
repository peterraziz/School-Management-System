<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Authenticatable
{

    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[]; // All the Columns

    use HasFactory;
    
    // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
    // Relation between Teachers and Specializations to get the specialization name
    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
    }

    // علاقة بين المعلمين والانواع لجلب جنس المعلم
    // Relation between Teachers and genders to get the gender of the Teacher
    public function genders()
    {
        return $this->belongsTo('App\Models\Gender', 'Gender_id');
    }

// علاقة المعلمين مع الاقسام
// Relation many to many between Teachers and Sections
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section_pivot');
    } //{{-- Has a code in SectionController --}}
}
