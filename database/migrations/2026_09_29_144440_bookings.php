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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained("students");
            $table->foreignId("session_id")->constrained("sessions")->cascadeOnDelete();
            $table->enum("status" , ['confirmed' , 'cancelled']);
            $table->timestamps();
            $table->unique(['student_id' , 'session_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
