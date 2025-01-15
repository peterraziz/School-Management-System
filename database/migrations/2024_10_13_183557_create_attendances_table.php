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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreignId('grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreignId('classroom_id')->references('id')->on('Classrooms')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreignId('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreignId('teacher_id')->references('id')->on('teachers')->onDelete('cascade')->onUpdate('cascade');
            
            $table->date('attendence_date');
            $table->boolean('attendence_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
