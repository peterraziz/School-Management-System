<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_Class extends Model
{
    protected $guarded= [];

    use HasFactory;

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
