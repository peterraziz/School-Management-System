<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::truncate();
        
        $students = new Student();
        $students->name = ['ar' => 'جون مارك', 'en' => 'John Mark'];
        $students->email = 'John@gmail.com';
        $students->password = Hash::make('12345678');
        $students->National_ID = '12345678301234';
        $students->Phone_number = '01222222222';
        $students->gender_id = 1;
        $students->nationalitie_id = Nationalitie::all()->unique()->random()->id;
        $students->blood_id =Type_Blood::all()->unique()->random()->id;
        $students->Date_Birth = date('2001-03-05');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year ='2025';
        $students->save();
    }
}
