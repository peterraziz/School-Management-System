<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Blood extends Model
{
    protected $fillable = ['Name'];
    // protected $guarded=[]; // All the Columns
    use HasFactory;
}
