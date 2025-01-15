<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Section'];

    protected $fillable=['Name_Section','Grade_id','Class_id'];
    protected $table = 'sections'; // Name of the Table
    public $timestamps = true;
    
    use HasFactory;


    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة
    // Relation Sections with Grades to get every Section with its Grade
    public function My_classes() // Used in Sections.blade {{-- My_classes is a function in Section.php Model --}}
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }

    // علاقة المعلمين مع الاقسام
    // Relation many to many between Teachers and Sections
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section_pivot');
    } //{{-- Has a code in SectionController --}}
    

    // علاقة الاقسام مع الصفوف
    // Relation between Sections and Grades
    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade','Grade_id');
    } 



}
