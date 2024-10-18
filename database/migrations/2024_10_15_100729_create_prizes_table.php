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
        Schema::create('wheels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['daily','vip', 'coin'])->default("daily");
            $table->integer('viplevel')->nullable();
            $table->integer('coin_amount')->nullable();
            $table->integer('num_of_times')->default(3);
            $table->string("status")->default("active");
            $table->timestamps();
        });

        Schema::create('wheel_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('itemid');
            $table->boolean('bind')->default(0);
            $table->text('image')->nullable();
            $table->unsignedBigInteger('wheel_id');
            $table->foreign('wheel_id')
                ->references('id')
                ->on('wheels');
            $table->timestamps();
        });

        Schema::create('wheel_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('wheel_item_id');
            $table->string("msg")->nullable();
            $table->foreign('wheel_item_id')
                ->references('id')
                ->on('wheel_items');
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
    }
};