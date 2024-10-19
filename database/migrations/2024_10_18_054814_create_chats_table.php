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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->dateTime("date")->nullalble();
            $table->string("uid")->nullalble();
            $table->string("type")->default("Chat");
            $table->string("channel")->default("World");
            $table->string("dest")->default(1);
            $table->text("msg")->nullalble();
            $table->string("from")->default("Thế Giới");
            $table->string("color")->default("yellow");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
