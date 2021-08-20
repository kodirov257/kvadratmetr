<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectProjectFacilitiesTable extends Migration
{

    public function up()
    {
        Schema::create('project_project_facilities', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('facility_id');
        });

        Schema::table('project_project_facilities', function (Blueprint $table) {
            $table->primary(['project_id', 'facility_id']);
            $table->foreign('project_id')->references('id')->on('project_projects')->onDelete('CASCADE');
            $table->foreign('facility_id')->references('id')->on('project_facilities')->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_project_facilities');
    }
}
