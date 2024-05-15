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
        Schema::create('character_classes', function (Blueprint $table) {
            $table->id('character_class_id');
            $table->text('class_name');
            $table->json('class_description');
            $table->json('hit_points');
            $table->json('class_proficiencies');
            $table->json('saving_throws');
            $table->json('skill_proficiencies');
            $table->json('initial_equipment');
            $table->json('multiclassing_info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_classes');
    }
};
