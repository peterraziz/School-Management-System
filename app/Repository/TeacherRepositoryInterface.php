<?php

namespace App\Repository;

interface TeacherRepositoryInterface{

    // get all Teachers
    public function getAllTeachers();
    
    // Getspecialization
    public function Getspecialization();
    
    // Get Gender
    public function GetGender();
    
    // Store Teacher
    public function StoreTeachers($request);

    // Edit Teacher
    public function EditTeachers($id);

    // Update Teachers
    public function UpdateTeachers($request,$id);
    
    // Delete Teachers
    public function DeleteTeachers($request);

}