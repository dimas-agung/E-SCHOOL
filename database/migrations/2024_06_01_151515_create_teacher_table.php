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
        Schema::create('teacher', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('nip')->unique();
            $table->string('nuptk')->unique();
            $table->string('name');
            $table->date('birth');
            $table->string('birth_place');
            $table->string('gender');
            $table->string('religion');
            $table->string('phone_number');
            $table->text('address');
            $table->string('status');
            $table->integer('is_active')->default(1);
            $table->date('join_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher');
    }
};
