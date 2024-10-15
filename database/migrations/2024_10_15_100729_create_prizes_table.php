<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Prize;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['daily','vip', 'coin'])->default("daily");
            $table->integer('viplevel')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('coin_amount')->nullable();
            $table->integer('num_of_times')->nullable();
            $table->timestamps();
        });

        Schema::create('prize_items', function (Blueprint $table) {
            $table->id();
            $table->string('prize');
            $table->string('itemid')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });

        Schema::create('prize_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('prize_id');
            $table->foreign('prize_id')
                ->references('id')
                ->on('prizes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prizes');
        Schema::dropIfExists('prize_user');
    }
};