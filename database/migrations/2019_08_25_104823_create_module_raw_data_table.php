<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleRawDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_raw_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('measurement_id');
            $table->unsignedBigInteger('expansion_module_id');
            $table->text('data');

            $table->foreign('measurement_id')
              ->references('id')->on('measurements');
            $table->foreign('expansion_module_id')
              ->references('id')->on('expansion_modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_raw_data');
    }
}
