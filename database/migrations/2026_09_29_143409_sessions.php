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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("academic_year_id")->constrained("academic_years");
            $table->foreignId("center_id")->constrained("centers")->cascadeOnDelete();
            $table->foreignId("teacher_id")->constrained("teachers");
            $table->enum("day" , ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"]);
            $table->time("start_time");
            $table->time("end_time");
            $table->unsignedInteger("capacity");
            $table->softDeletes("deleted_at");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
