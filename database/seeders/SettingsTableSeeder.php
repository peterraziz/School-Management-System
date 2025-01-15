<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::truncate();

        $data = [
            ['key' => 'current_session', 'value' => '2024-2025'],
            ['key' => 'school_title', 'value' => 'PIS'],
            ['key' => 'school_name', 'value' => 'Pharaohs International Schools'],
            ['key' => 'end_first_term', 'value' => '01-12-2024'],
            ['key' => 'end_second_term', 'value' => '01-03-2025'],  
            ['key' => 'phone', 'value' => '0123456789'],
            ['key' => 'address', 'value' => 'Cairo, Egypt'],
            ['key' => 'school_email', 'value' => 'pharaohs@gmail.com'],
            ['key' => 'logo', 'value' => '1.jpg'], 
        ];
        
        DB::table('settings')->insert($data);
    }
}
