<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::truncate();
        
        $Sections = [
            ['en' => 'A', 'ar' => 'أ'],
            ['en' => 'B', 'ar' => 'ب'],
            ['en' => 'C', 'ar' => 'ت'],
        ];
        
        foreach ($Sections as $section) {
            Section::create([
                'Name_Section' => $section,
                'Status' => 1,
                'Grade_id' => Grade::all()->unique()->random()->id,
                'Class_id' => Classroom::all()->unique()->random()->id
            ]);
        }
    }
}
