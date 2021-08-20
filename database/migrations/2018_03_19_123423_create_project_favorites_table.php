<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectFavoritesTable extends Migration
{
    public function up()
    {
        Schema::create('project_favorites', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project_projects')->onDelete('CASCADE');
            $table->primary(['user_id', 'project_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_favorites');
    }
}
