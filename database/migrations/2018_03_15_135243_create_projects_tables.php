<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTables extends Migration
{
    public function up()
    {
        Schema::create('project_projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->string('title');
            $table->integer('price');
            $table->text('address');
            $table->text('content');
            $table->string('status', 16);
            $table->text('reject_reason')->nullable();
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expires_at')->nullable();
        });

        Schema::create('project_project_values', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project_projects')->onDelete('CASCADE');
            $table->unsignedInteger('characteristic_id');
            $table->foreign('characteristic_id')->references('id')->on('project_characteristics')->onDelete('CASCADE');
            $table->string('value');
            $table->primary(['project_id', 'characteristic_id']);
        });

        Schema::create('project_project_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project_projects')->onDelete('CASCADE');
            $table->string('file');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_project_photos');
        Schema::dropIfExists('project_project_values');
        Schema::dropIfExists('project_projects');
    }
}
