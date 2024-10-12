<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('userid');
            $table->string('main_id')->nullable();
            $table->string('password2');
            $table->string('role')->default('member');
            $table->string('email2')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('change_pass')->default(0);
            $table->integer('balance')->default(0);
            $table->dateTime("last_login")->nullable();
            $table->boolean('is_online')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User;
        $user->name = "admin";
        $user->username = "admin";
        $user->userid = "admin";
        $user->role = "admin";
        $user->email = "admin@gmail.com";
        $user->password2 = "admin";
        $user->password = \Hash::make("Zxcv1234@");
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();

        $user = new User;
        $user->name = "member0011";
        $user->username = "member0011";
        $user->userid = "1184";
        $user->role = "member";
        $user->email = "member0011@gmail.com";
        $user->password2 = "123456";
        $user->password = \Hash::make("123456");
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
