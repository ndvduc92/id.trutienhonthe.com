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
        Schema::create('giftcodes', function (Blueprint $table) {
            $table->id();
            $table->string('giftcode')->unique();
            $table->dateTime('expired');
            $table->integer('count')->default(0);
            $table->string("type")->default("all");
            $table->string('status')->default('active');
            $table->integer('viplevel')->nullable();
            $table->timestamps();
        });

        Schema::create('giftcode_items', function (Blueprint $table) {
            $table->id();
            $table->string('itemid');
            $table->string('name');
            $table->integer('quantity')->default(1);
            $table->boolean('bind')->default(true);
            $table->integer('giftcode_id');
            $table->foreign('giftcode_id')->references('id')->on('giftcodes')->onDelete("cascade");
            $table->timestamps();
        });

        Schema::create('giftcode_only_users', function (Blueprint $table) {
            $table->id();
            $table->integer('giftcode_id');
            $table->foreign('giftcode_id')->references('id')->on('giftcodes')->onDelete("cascade");
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->timestamps();
        });

        Schema::create('giftcode_users', function (Blueprint $table) {
            $table->id();
            $table->integer('giftcode_id');
            $table->integer('user_id');
            $table->integer('char_id');
            $table->foreign('giftcode_id')->references('id')->on('giftcodes')->onDelete("cascade");
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giftcode_items');
    }
};
