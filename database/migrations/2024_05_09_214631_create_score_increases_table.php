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
        Schema::create('score_increases', function (Blueprint $table) {
            $table->id('score_increase_id');
            $table->integer('str_inc')->default(0);
            $table->integer('dex_inc')->default(0);
            $table->integer('con_inc')->default(0);
            $table->integer('int_inc')->default(0);
            $table->integer('wis_inc')->default(0);
            $table->integer('cha_inc')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score_increases');
    }
};
