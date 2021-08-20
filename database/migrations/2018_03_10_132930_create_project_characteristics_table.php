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
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('type');
            $table->boolean('required');
            $table->json('variants');
            $table->boolean('is_range');
            $table->integer('sort');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('project_characteristics', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_characteristics');
    }
}
