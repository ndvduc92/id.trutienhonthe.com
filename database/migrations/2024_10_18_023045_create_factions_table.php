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
        Schema::create('factions', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("master_id");
            $table->integer("level");
            $table->integer("balance")->default(0);
            $table->timestamps();
        });

        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("master_id");
            $table->string("faction_id");
            $table->timestamps();
        });

        Schema::create('family_users', function (Blueprint $table) {
            $table->id();
            $table->string("char_id");
            $table->string("family_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factions');
    }
};
