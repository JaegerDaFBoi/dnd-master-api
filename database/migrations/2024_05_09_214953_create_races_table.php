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
        Schema::create('races', function (Blueprint $table) {
            $table->id('race_id');
            $table->text('race_name');
            $table->json('race_description');
            $table->text('race_type');
            $table->unsignedBigInteger('score_increase_fk');
            $table->foreign('score_increase_fk')->references('score_increase_id')->on('score_increases')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('race_features_fk');
            $table->foreign('race_features_fk')->references('race_feature_id')->on('race_features')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
