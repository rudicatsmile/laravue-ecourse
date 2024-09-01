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
        Schema::create('detail_sections', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('no_urut', false);
            $table->string('title');
            $table->string('slug');
            $table->string('url_video')->nullable();
            $table->string('link_src')->nullable();
            $table->text('description')->nullable();
            $table->enum('type',['free', 'paid'])->default('paid');

            $table->unsignedBigInteger('section_id');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sections');
    }
};
