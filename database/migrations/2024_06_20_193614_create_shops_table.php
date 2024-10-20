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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('itemid');
            $table->integer('price');
            $table->integer('stack')->default(1);
            $table->string("status")->default("active");
            $table->timestamps();
        });

        Schema::create('shop_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->integer("quantity")->default(1);
            $table->integer('shop_id');
            $table->string("char_id");
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
