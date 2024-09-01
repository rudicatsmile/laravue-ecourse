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
        Schema::create('user_finish_sections', function (Blueprint $table) {

            $table->unsignedBigInteger('has_courses_user_id');
            $table->foreign('has_courses_user_id')->references('user_id')->on('user_has_courses')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('has_courses_id');
            $table->foreign('has_courses_id')->references('courses_id')->on('user_has_courses')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('detail_section_id');
            $table->foreign('detail_section_id')->references('id')->on('detail_sections')->onDelete('cascade')->onUpdate('cascade');

            $table->text('desc')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_finish_sections');
    }
};
