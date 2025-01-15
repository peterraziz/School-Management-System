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
        Schema::create('student__accounts', function (Blueprint $table) {
            $table->id();
            $table->date('date'); //// new
            $table->string('type'); ////
            //
            $table->foreignId('fee_invoice_id')->nullable()->references('id')->on('fee_invoices')->onDelete('cascade')->onUpdate('cascade'); ////
            // 
            $table->foreignId('receipt_id')->nullable()->references('id')->on('receipt_students')->onDelete('cascade')->onUpdate('cascade'); ////
            //
            $table->foreignId('processing_id')->nullable()->references('id')->on('processing_fees')->onDelete('cascade')->onUpdate('cascade'); ////
            //
            $table->foreignId('payment_id')->nullable()->references('id')->on('payment_students')->onDelete('cascade')->onUpdate('cascade'); ////
            
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            
            // DELETE :::::::::::::::::==========
            // $table->foreignId('Grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
            // DELETE :::::::::::::::::==========
            // $table->foreignId('Classroom_id')->references('id')->on('Classrooms')->onDelete('cascade')->onUpdate('cascade');
            
            $table->decimal('Debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student__accounts');
    }
};
