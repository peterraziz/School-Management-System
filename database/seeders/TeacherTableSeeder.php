<?php

namespace Database\Seeders;

use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Teacher::truncate();
        
        // Teacher::create([
        //     'name' => ['ar' => 'بيتر', 'en' => 'Peter'],
        //     'Email' => 'peter@gmail.com',
        //     'Password' => Hash::make('12345678'),
        //     'Specialization_id' => Specialization::all()->random()->id,
        //     // 'Gender_id' => 1, // Uncomment if needed
        //     'Joining_Date' => '2025-01-01',
        //     'Address' => 'Cairo',
        // ]);
        // $Teacher = new Teacher();
        // $Teacher->name = ['ar' => 'بيتر', 'en' => 'Peter'];
        // // $Teacher->Email = 'peter@gmail.com';
        // $Teacher->Password = Hash::make('12345678');
        // $Teacher->Specialization_id = Specialization::all()->random()->id;
        // $Teacher->Gender_id = 1;
        // $Teacher->Joining_Date = date('2025-01-01');
        // $Teacher->Address ='Cairo';
        // $Teacher->save();


    }
}
