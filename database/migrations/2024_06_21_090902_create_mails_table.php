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
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->integer('receiver')->nullable();
            $table->foreign('receiver')->references('id')->on('users')->onDelete("cascade");
            $table->integer('send_by')->nullable();
            $table->foreign('send_by')->references('id')->on('users')->onDelete("cascade");
            $table->integer("char_id");
            $table->integer('itemid');
            $table->integer("quantity");
            $table->text("description");
            $table->string("status")->default("success");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mails');
    }
};
