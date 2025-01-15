<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{ 
    public function run()
    {
        $permissions = [ 
            'Home',
            'Grades',
            'Classes',
            'Sections',
            'Students',
            'list Students',
            'Add student',
            'Students Promotions list',
            'Students Promotions',
            'Graduations List',
            'Add Graduate',
            'Teachers', 
            'Parents', 
            'Accounts',
            'Tuition Fees',
            'Tuition invoices',
            'Payments',
            'Exclude fees',
            'Refund of fees',
            'Quizzes List', 
            'Quizzes', 
            'Questions List', 
            'Study materials', 
            'Attendance', 
            'Library', 
            'Online lectures', 
            'Profile', 
            'Settings', 

            'Admins list',
            'Admins permissions',
            'Add new admin',
            'Edit Admin',
            'Delete Admin',
            'Add new permission',
            'Show permission',
            'Edit permission',
            'Delete permission',

            'Processes for students',
            'Students Data and Attachments',
            'Add Invoice Fee',
            'Pay fees',  
            'Edit student',
            'Delete student',

        ];
        
        foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
        }
    }
}
