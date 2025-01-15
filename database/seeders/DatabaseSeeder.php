<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Database\Seeders\NationalitiesTableSeeder;
// use NationalitiesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $this->call([
            PermissionTableSeeder::class,
            UserTableSeeder::class,
            GradeTableSeeder::class,
            // ClassroomTableSeeder::class,
            // SectionTableSeeder::class,
            BloodTableSeeder::class,
            NationalitiesTableSeeder::class,
            ReligionTableSeeder::class,
            GenderTableSeeder::class,
            SpecializationTableSeeder::class,
            ParentsTableSeeder::class,
            SettingsTableSeeder::class,
            // TeacherTableSeeder::class,
            // StudentTableSeeder::class,
            ]);
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
