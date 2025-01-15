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
        Schema::create('libraries', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('file_name');
            
            $table->foreignId('Grade_id')->references('id')->on('Grades')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('Classroom_id')->references('id')->on('Classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('teacher_id')->references('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
