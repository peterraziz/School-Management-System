<?php

namespace App\Repository;

interface StudentRepositoryInterface{
    // have to make: php artisan make:provider RepoServiceProvider, and also add it in app.php

    // Get Student Form Student
    public function Get_Student();
    
    // Edit Student Form Student
    public function Edit_Student($id);
    
    // Show Student Form Student
    public function Show_Student($id);

    // Update Student Form Student
    public function Update_Student($id,$request);

    // Get Add Form Student
    public function Create_Student();

    // Get classrooms
    public function Get_classrooms($id);

    //Get Sections
    public function Get_Sections($id);

    //Store Student
    public function Store_Student($request);
    
    //Delete Student
    public function Delete_Student($request);
    
    //Upload attachment
    public function Upload_attachment($request);
    
    //Download attachment
    public function Download_attachment($studentsname,$filename);
    
    //Delete attachment
    public function Delete_attachment($request);

}