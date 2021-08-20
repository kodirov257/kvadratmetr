<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTables extends Migration
{
    public function up()
    {
        Schema::create('project_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('developer_id');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->text('about_uz');
            $table->text('about_ru');
            $table->text('about_en');
            $table->unsignedInteger('category_id');
//            $table->unsignedInteger('region_id')->nullable();
            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('impressions')->default(0); 
            $table->unsignedInteger('clicks')->default(0);
            $table->unsignedInteger('leads')->default(0);
            $table->string('address_uz');
            $table->string('address_ru');
            $table->string('address_en');
            $table->string('landmark_uz');
            $table->string('landmark_ru');
            $table->string('landmark_en');
            $table->string('lng');
            $table->string('ltd');
            $table->smallInteger('status');
            $table->text('reject_reason')->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expires_at')->nullable();
        });

        Schema::table('project_projects', function (Blueprint $table) {
            $table->foreign('developer_id')->references('id')->on('project_developers')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
//            $table->foreign('region_id')->references('id')->on('regions')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_projects');
    }
}
