<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
        
            //============= From ========== 
            // $table->unsignedBigInteger('student_id');
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
        
            // $table->unsignedBigInteger('from_grade');
            $table->foreignId('from_grade')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
        
            // $table->unsignedBigInteger('from_Classroom');
            $table->foreignId('from_Classroom')->references('id')->on('Classrooms')->onDelete('cascade')->onUpdate('cascade');
        
            // $table->unsignedBigInteger('from_section');
            $table->foreignId('from_section')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
        
            $table->string('academic_year');
        
            //============= To ========== 
            // $table->unsignedBigInteger('to_grade');
            $table->foreignId('to_grade')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
        
            // $table->unsignedBigInteger('to_Classroom');
            $table->foreignId('to_Classroom')->references('id')->on('Classrooms')->onDelete('cascade')->onUpdate('cascade');
        
            // $table->unsignedBigInteger('to_section');
            $table->foreignId('to_section')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
        
            $table->string('academic_year_new');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
