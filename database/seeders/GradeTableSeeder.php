<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::truncate();
        
        $grades = [
            ['en'=> 'Primary stage', 'ar'=> 'المرحلة الأبتدائية'],
            ['en'=> 'Middle School', 'ar'=> 'المرحلة الأعدادية'],
            ['en'=> 'High school', 'ar'=> 'المرحلة الثانوية'],
        ];
        
        foreach ($grades as $grade) {
            Grade::create(['Name' => $grade]);
        }

    }
}
