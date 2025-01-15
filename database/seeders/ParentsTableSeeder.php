<?php

namespace Database\Seeders;

use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ParentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        My_Parent::truncate();
        
        $my_parents = new My_Parent();
        $my_parents->email = 'Mark@gmail.com';
        $my_parents->password = Hash::make('12345678');
    
        $my_parents->Name_Father = ['en' => 'Mark', 'ar' => 'مارك'];
        $my_parents->National_ID_Father = '12345672101234';
        $my_parents->Passport_ID_Father = '12345678101234';
        $my_parents->Phone_Father = '01234567899';
        $my_parents->Job_Father = ['en' => 'Programmer', 'ar' => 'مبرمج'];
        $my_parents->Nationality_Father_id = Nationalitie::all()->unique()->random()->id;
        $my_parents->Blood_Type_Father_id =Type_Blood::all()->unique()->random()->id;
        $my_parents->Religion_Father_id = Religion::all()->unique()->random()->id;
        // $my_parents->Religion_Father_id = ['en' => 'Christian', 'ar' => 'مسيحي'];
        $my_parents->Address_Father ='Cairo';
    
        $my_parents->Name_Mother = ['en' => 'Sandra', 'ar' => 'ساندرا'];
        $my_parents->National_ID_Mother = '12345678101234';
        $my_parents->Passport_ID_Mother = '12345678101234';
        $my_parents->Phone_Mother = '01223456789';
        $my_parents->Job_Mother = ['en' => 'Doctor', 'ar' => 'دكتور'];
        $my_parents->Nationality_Mother_id = Nationalitie::all()->unique()->random()->id;
        $my_parents->Blood_Type_Mother_id =Type_Blood::all()->unique()->random()->id;
        $my_parents->Religion_Mother_id = Religion::all()->unique()->random()->id;
        // $my_parents->Religion_Mother_id = ['en' => 'Christian', 'ar' => 'مسيحي'];
        $my_parents->Address_Mother ='Berlin';
    
        $my_parents->save();
    
    }
}
