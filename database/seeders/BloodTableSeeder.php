<?php

namespace Database\Seeders;

use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type_Blood::truncate();
        // or
        // DB::table('type__bloods')->delete();
        
        $bgs = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'Unknown - غير معروف'];

        foreach($bgs as  $bg){
            Type_Blood::create(['Name' => $bg]);
        }
        
    }
}
