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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_image')->nullable();
            $table->string('read_more')->nullable();
            $table->string('join_now')->nullable();
            $table->string('course_price')->nullable();
            $table->text('course_title')->nullable();
            $table->string('course_name')->nullable();
            $table->string('course_time')->nullable();
            $table->string('course_students')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
