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
        Schema::create('center_student', function (Blueprint $table) {
            $table->foreignId("student_id")->constrained("students");
            $table->foreignId("center_id")->constrained("centers")->cascadeOnDelete();
            $table->integer("student_number");
            $table->enum("status",['active','inactive']);
            $table->unique(['student_id','center_id']);
            $table->unique(['center_id','student_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_student');
    }
};
