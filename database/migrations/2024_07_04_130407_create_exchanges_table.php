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
        Schema::create('exchanges', function (Blueprint $table) {
            $table->id();
            $table->integer('from_user_id');
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete("cascade");
            $table->integer('to_user_id');
            $table->foreign('to_user_id')->references('id')->on('guilds')->onDelete("cascade");
            $table->integer("amount");
            $table->date("date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchanges');
    }
};
