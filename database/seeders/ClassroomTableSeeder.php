<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classroom::truncate();
        
        $classrooms = [
            ['en'=> 'First grade', 'ar'=> 'الصف الأول'],
            ['en'=> 'Second grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third grade', 'ar'=> 'الصف الثالث'],
        ];
        
        foreach ($classrooms as $classroom) {
            Classroom::create([
            'Name_Class' => $classroom,
            'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }
    }
}
