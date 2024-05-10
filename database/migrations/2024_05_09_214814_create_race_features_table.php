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
        Schema::create('race_features', function (Blueprint $table) {
            $table->id('race_feature_id');
            $table->enum('size', ['Tiny', 'Small', 'Medium or Small', 'Medium', 'Large', 'Huge', 'Gargantuan']);
            $table->integer('walk_speed');
            $table->integer('fly_speed')->nullable();
            $table->integer('swim_speed')->nullable();
            $table->json('languages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_features');
    }
};
