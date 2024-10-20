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
        Schema::create('loggings', function (Blueprint $table) {
            $table->id();
            $table->string("char_id")->nullable();
            // refine, login, boss
            $table->string("type")->nullable();
            //login, logout for type = login
            $table->string("value")->nullable();
            $table->integer("refine_level_before")->nullable();
            $table->integer("refine_level_after")->nullable();

            //itemid for refine...
            $table->string("itemid")->nullable();
            //stoneid for refine
            $table->string("refine_stoneid")->nullable();
            $table->string("bossid")->nullable();
            $table->dateTime("date")->nullable();
            $table->timestamps();

            $table->unique(['type', 'date', 'char_id'], "logging_char_unique");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loggings');
    }
};
