<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('expansion_module_id');
            $table->string('alias');
            $table->boolean('is_active')->default(true);
            $table->json('config')->nullable();
            $table->json('properties')->nullable();
            

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
        Schema::dropIfExists('devices');
    }
}
