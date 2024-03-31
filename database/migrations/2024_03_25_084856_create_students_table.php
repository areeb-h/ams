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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('sid');
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('attendance_score')->nullable();
            $table->string('status')->default(1);
            $table->dateTime('admission_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
