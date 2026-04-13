<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Change arm_id and class_id foreign keys from CASCADE to RESTRICT
     * so that deleting an arm or class does NOT delete students.
     */
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop existing cascade foreign keys
            $table->dropForeign(['class_id']);
            $table->dropForeign(['arm_id']);

            // Re-add with RESTRICT — prevents deletion if students exist
            $table->foreign('class_id')
                  ->references('id')->on('school_classes')
                  ->onDelete('restrict');

            $table->foreign('arm_id')
                  ->references('id')->on('arms')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['class_id']);
            $table->dropForeign(['arm_id']);

            $table->foreign('class_id')
                  ->references('id')->on('school_classes')
                  ->onDelete('cascade');

            $table->foreign('arm_id')
                  ->references('id')->on('arms')
                  ->onDelete('cascade');
        });
    }
};
