<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalogueMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analogue_measurements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->useCurrent();
            $table->float('ad_0');
            $table->float('ad_1');
            $table->float('ad_2');
            $table->float('ad_3');
            $table->float('ad_4');
            $table->float('ad_5');
            $table->float('ad_6');
            $table->float('ad_7');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analogue_measurements');
    }
}
