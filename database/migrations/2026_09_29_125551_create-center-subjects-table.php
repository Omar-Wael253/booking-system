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
        Schema::create('center_subject', function (Blueprint $table) {
            $table->foreignId("center_id")->constrained("centers")->cascadeOnDelete();
            $table->foreignId("subject_id")->constrained("subjects");
            $table->enum("status",['active','inactive']);
            $table->unique(['center_id','subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('center_subject');
    }
};
