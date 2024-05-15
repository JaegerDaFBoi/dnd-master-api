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
        Schema::create('character_traits', function (Blueprint $table) {
            $table->id('character_trait_id');
            $table->mediumText('trait_title');
            $table->longText('trait_description');
            $table->text('trait_type')->nullable();
            $table->json('trait_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_traits');
    }
};
