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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alfabet')->constrained('alfabet')->onDelete('cascade');
            $table->text('text_indo');
            $table->text('text_eng');
            $table->text('image');
            $table->string('video_sibi');
            $table->string('video_bisindo');
            $table->string('video_asl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
