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
        Schema::create('race_has_traits', function (Blueprint $table) {
            $table->id('race_traits_id');
            $table->unsignedBigInteger('trait_fk');
            $table->foreign('trait_fk')->references('character_trait_id')->on('character_traits')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('race_fk');
            $table->foreign('race_fk')->references('race_id')->on('races')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_has_traits');
    }
};
