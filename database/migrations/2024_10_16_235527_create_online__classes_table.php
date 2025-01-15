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
        Schema::create('online__classes', function (Blueprint $table) {
            $table->id();
            $table->boolean('integration');
            
            $table->foreignId('Grade_id')->references('id')->on('Grades')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('Classroom_id')->references('id')->on('Classrooms')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            
            // $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('created_by');
            
            $table->string('meeting_id');
            $table->string('topic');
            $table->dateTime('start_at');
            $table->integer('duration')->comment('minutes');
            $table->string('password')->comment('meeting password');
            $table->text('join_url');
            $table->text('start_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online__classes');
    }
};
