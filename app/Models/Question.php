<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function quiz()
    {
        return $this->belongsTo(Quizze::class);
    }
}
