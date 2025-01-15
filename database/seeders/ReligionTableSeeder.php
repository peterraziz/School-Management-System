<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Religion::truncate();
        // or
        // DB::table('type__bloods')->delete();
        
        $religions = [
        
            [
                'en'=> 'Jewish',
                'ar'=> 'يهودي'
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي'
            ],
            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غير ذلك'
            ],
        
        ];

        foreach ($religions as $R) {
            Religion::create(['Name' => $R]);
        }
    }
}
