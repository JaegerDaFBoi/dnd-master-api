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
        Schema::create('character_class_has_traits', function (Blueprint $table) {
            $table->id('character_class_traits_id');
            $table->unsignedBigInteger('trait_fk');
            $table->foreign('trait_fk')->references('character_trait_id')->on('character_traits')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('character_class_fk');
            $table->foreign('character_class_fk')->references('character_class_id')->on('character_classes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('trait_level');
            $table->boolean('has_per_level_stats')->default(false);
            $table->json('per_level_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_class_has_traits');
    }
};
