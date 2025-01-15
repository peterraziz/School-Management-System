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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->bigInteger('National_ID')->unique()->nullable();
            $table->bigInteger('Phone_number')->unique()->nullable();
            
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            
            $table->bigInteger('nationalitie_id')->unsigned();
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('blood_id')->unsigned();
            $table->foreign('blood_id')->references('id')->on('type__bloods')->onDelete('cascade')->onUpdate('cascade');
            
            $table->date('Date_Birth');
            
            $table->bigInteger('Grade_id')->unsigned();
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('Classroom_id')->unsigned();
            $table->foreign('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('my__parents')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('academic_year');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
