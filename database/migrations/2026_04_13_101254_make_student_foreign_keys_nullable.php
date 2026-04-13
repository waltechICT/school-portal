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
        Schema::table('students', function (Blueprint $table) {
            // Drop existing foreign keys
            $table->dropForeign(['class_id']);
            $table->dropForeign(['arm_id']);

            // Make columns nullable and change foreign key to SET NULL
            $table->unsignedBigInteger('class_id')->nullable()->change();
            $table->unsignedBigInteger('arm_id')->nullable()->change();

            $table->foreign('class_id')
                ->references('id')->on('school_classes')
                ->onDelete('set null');

            $table->foreign('arm_id')
                ->references('id')->on('arms')
                ->onDelete('set null');
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

            $table->unsignedBigInteger('class_id')->nullable(false)->change();
            $table->unsignedBigInteger('arm_id')->nullable(false)->change();

            $table->foreign('class_id')
                ->references('id')->on('school_classes')
                ->onDelete('restrict');

            $table->foreign('arm_id')
                ->references('id')->on('arms')
                ->onDelete('restrict');
        });
    }
};
