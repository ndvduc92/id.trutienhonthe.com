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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->integer("shop_quantity")->nullable();
            $table->integer("knb_amount")->nullable();
            $table->integer('shop_id')->nullable();
            $table->string("type")->default("knb");
            $table->string("char_id")->nullable();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
