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
        Schema::create('fames', function (Blueprint $table) {
            $table->id();
            $table->string("char_id")->nullalble();
            $table->string("type")->nullalble();
            //login, logout for type = login
            $table->string("value")->nullalble();
            $table->string("itemid")->nullalble();
            $table->string("bossid")->nullalble();
            $table->dateTime("date")->nullalble();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fames');
    }
};
