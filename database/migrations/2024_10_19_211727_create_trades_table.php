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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->string("from_char_id");
            $table->string("to_char_id");
            $table->dateTime("date");
            $table->timestamps();
        });

        Schema::create('trade_items', function (Blueprint $table) {
            $table->id();
            $table->integer('trade_id');
            $table->foreign('trade_id')->references('id')->on('trades')->onDelete("cascade");
            $table->string('itemid');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
