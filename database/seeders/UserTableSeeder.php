<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $user = User::create([
            'name'=>'Peter Aziz',
            'email'=>'peteraziz@gmail.com', 
            'password'=>Hash::make('111111'),
            'roles_name' => ["Owner"], 
            'Status' => 'Activated',
            ]); 
            
            $role = Role::create(['name' => 'Owner']);
            
            $permissions = Permission::pluck('id','id')->all();
            
            $role->syncPermissions($permissions);
            
            $user->assignRole([$role->id]);
        
    } 
}
