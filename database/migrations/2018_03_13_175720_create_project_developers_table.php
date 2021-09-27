<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDevelopersTable extends Migration
{
    public function up()
    {
        Schema::create('project_developers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->text('about_uz');
            $table->text('about_ru');
            $table->text('about_en');
            $table->string('slug', 255);
            $table->integer('status');
            $table->string('main_number', 20)->nullable();
            $table->string('call_center', 20)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('instagram', 50)->nullable();
            $table->string('tik_tok', 50)->nullable();
            $table->string('telegram', 50)->nullable();
            $table->string('youtube', 50)->nullable();
            $table->string('twitter', 50)->nullable();
            $table->string('address_uz');
            $table->string('address_ru');
            $table->string('address_en');
            $table->string('landmark_uz');
            $table->string('landmark_ru');
            $table->string('landmark_en');
            $table->string('lng');
            $table->string('ltd');
            $table->unsignedInteger('impressions')->default(0);
            $table->unsignedInteger('clicks')->default(0);
            $table->unsignedInteger('leads')->default(0);
            $table->timestamps();
        });

        Schema::table('project_developers', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_developers');
    }
}
