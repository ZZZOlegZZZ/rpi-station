<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpansionModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expansion_modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alias');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_optional')->default(true);
            $table->json('config')->nullable();
            $table->json('properties')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expansion_modules');
    }
}
