<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// return new class extends Migration {
class CreateSectionsTable extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('Name_Section');
            $table->integer('Status');
        
            $table->bigInteger('Grade_id')->unsigned();
            $table->foreign('Grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
        
            $table->bigInteger('Class_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
