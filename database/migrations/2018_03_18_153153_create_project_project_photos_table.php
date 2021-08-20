<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectProjectPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_project_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project_projects')->onDelete('CASCADE');
            $table->string('file');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_project_photos');
    }
}
