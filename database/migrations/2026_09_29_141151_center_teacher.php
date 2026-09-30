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
        Schema::create('center_teacher', function (Blueprint $table) {
            $table->foreignId("center_id")->constrained("centers")->cascadeOnDelete();
            $table->foreignId("teacher_id")->constrained("teachers");
            $table->foreignId("academic_year_id")->constrained("academic_years");
            $table->enum("status" , ['active' , 'inactive']);
            $table->unique(['center_id','teacher_id' , 'academic_year_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_teacher');
    }
};
