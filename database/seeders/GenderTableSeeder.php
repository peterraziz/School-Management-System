<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // can do it in DatabaseSeeder 
        Gender::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // can do it in DatabaseSeeder 
    
        $gender = [
            ['en'=> 'Male', 'ar'=> 'ذكر'],
            ['en'=> 'Female', 'ar'=> 'أنثى'],
        
        ];
        foreach ($gender as $gen) {
            Gender::create(['Name' => $gen]);
        }
        
    }
}
