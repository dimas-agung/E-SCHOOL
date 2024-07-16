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
        Schema::create('school_timetable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cource_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('teacher_id');
            $table->string('day');
            $table->string('time_sequence');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('semester');
            $table->integer('year');
            $table->string('status');
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_timetable');
    }
};
