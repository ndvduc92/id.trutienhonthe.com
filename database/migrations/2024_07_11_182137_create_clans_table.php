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
        Schema::create('clans', function (Blueprint $table) {
            $table->id();
            $table->string("guildid")->unique();
            $table->string("name");
            $table->string("char_id");
            $table->string("level");
            $table->integer("size");
            $table->timestamps();
        });

        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string("fid")->unique();
            $table->string("guildid");
            $table->string("name");
            $table->string("char_id");
            $table->timestamps();
        });

        Schema::create('family_users', function (Blueprint $table) {
            $table->id();
            $table->string("fid");
            $table->string("char_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clans');
    }
};
