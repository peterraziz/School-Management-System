<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $guarded = [];
    public $timestamps = true;
    use HasFactory;


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }


    public function quiz()
    {
        return $this->belongsTo(Quizze::class, 'quiz_id');
    }
}
