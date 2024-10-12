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
        Schema::create('chars', function (Blueprint $table) {
            $table->id();
            $table->string("userid");
            $table->string("char_id")->unique();
            $table->string("name");
            $table->string("name2")->nullable();
            $table->string("gender")->defaut("Nam");
            $table->integer("pk_value")->nullable();
            $table->string("class")->defaut(0);
            $table->integer("level")->defaut(1);
            $table->string("reputation")->defaut(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chars');
    }
};
