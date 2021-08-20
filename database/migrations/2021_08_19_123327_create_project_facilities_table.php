<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectFacilitiesTable extends Migration
{

    public function up()
    {
        Schema::create('project_facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('icon');
            $table->string('comment');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
        });

        Schema::table('project_facilities', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_facilities');
    }
}
