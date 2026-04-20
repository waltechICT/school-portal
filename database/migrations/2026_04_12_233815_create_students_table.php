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
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->string('student_id')->unique();
            $table->string('admission_no')->unique();
            $table->string('surname');
            $table->string('other_names');
            $table->foreignId('class_id')->constrained('school_classes')->onDelete('cascade');
            $table->foreignId('arm_id')->constrained('arms')->onDelete('cascade');
            $table->string('sex');
            $table->date('date_of_birth');
            $table->string('guardian_name');
            $table->string('guardian_phone');
            $table->text('guardian_address');
            $table->string('guardian_occupation');
            $table->string('student_passport')->nullable();
            $table->boolean('is_enabled')->default(true);
            $table->timestamps();
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
