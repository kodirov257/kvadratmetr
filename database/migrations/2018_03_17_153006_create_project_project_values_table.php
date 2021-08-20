<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectProjectValuesTable extends Migration
{
    public function up()
    {
        Schema::create('project_project_values', function (Blueprint $table) {
            $table->id('project_id');
            $table->unsignedInteger('characteristic_id');
            $table->string('value')->nullable();
            $table->string('value_from')->nullable();
            $table->string('value_to')->nullable();
            $table->boolean('main')->default(false);
            $table->integer('sort')->default(1000);
        });

        Schema::table('project_project_values', function (Blueprint $table) {
            $table->primary(['project_id', 'characteristic_id']);
            $table->foreign('project_id')->references('id')->on('project_projects')->onDelete('CASCADE');
            $table->foreign('characteristic_id')->references('id')->on('project_characteristics')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_project_values');
    }
}
