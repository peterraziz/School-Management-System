<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Truncate the specializations table
        Specialization::truncate();
        // Re-enable foreign key checks
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'اللغة العربية'],
            ['en'=> 'English', 'ar'=> 'اللغة الأنجليزية'],
            ['en'=> 'German', 'ar'=> 'اللغة الألمانية'],
            ['en'=> '[French]', 'ar'=> 'اللغة الفرنسية'],
            ['en'=> '[Italian]', 'ar'=> 'اللغة الأيطالية'],
            ['en'=> 'Science', 'ar'=> 'العلوم'],
            ['en'=> 'History', 'ar'=> 'التاريخ'],
            ['en'=> 'Geography', 'ar'=> 'الجغرافيا'],
            ['en'=> 'Mathematics', 'ar'=> 'الرياضيات'],
            ['en'=> 'Biology', 'ar'=> 'الأحياء'],
            ['en'=> 'Computer', 'ar'=> 'الحاسب الآلي'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}
