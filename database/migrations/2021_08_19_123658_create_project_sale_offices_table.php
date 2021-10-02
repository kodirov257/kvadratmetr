<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSaleOfficesTable extends Migration
{

    public function up()
    {
        Schema::create('project_sale_offices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('developer_id');
            $table->string('lng');
            $table->string('ltd');
            $table->string('address_uz');
            $table->string('address_ru');
            $table->string('address_en');
            $table->timestamps();
        });

        Schema::table('project_sale_offices', function (Blueprint $table) {
            $table->foreign('developer_id')->references('id')->on('project_developers')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_sale_offices');
    }
}
