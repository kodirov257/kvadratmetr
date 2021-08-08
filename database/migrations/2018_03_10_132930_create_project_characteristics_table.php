<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectCharacteristicsTable extends Migration
{
    public function up()
    {
        Schema::create('project_characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
            $table->string('name');
            $table->string('type');
            $table->boolean('required');
            $table->json('variants');
            $table->integer('sort');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_characteristics');
    }
}
