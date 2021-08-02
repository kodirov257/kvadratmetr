<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->boolean('phone_verified')->default(false);
            $table->string('password');
            $table->bigInteger('balance')->default(0);
            $table->string('verify_token')->nullable()->unique();
            $table->string('phone_verify_token')->nullable();
            $table->timestamp('phone_verify_token_expire')->nullable();
            $table->boolean('phone_auth')->default(false);
            $table->string('role', 16);
            $table->integer('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
