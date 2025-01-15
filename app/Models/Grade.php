<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model 
{
    use HasTranslations;
    public $translatable = ['Name'];

    protected $fillable=['Name','Notes'];
    protected $table = 'Grades';
    public $timestamps = true;

    // علاقة المراحل الدراسية لجلب الاقسام المتعلقة بكل مرحلة
    // Relation Sections with Grades to get every Section with its Grade
    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }


}