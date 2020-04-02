<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePushClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('is_active')->default(true);
            $table->string('host');
            $table->integer('port')->default(21);
            $table->string('uri')->default('api/meteodata/push');
            $table->string('method')->default('post');
            $table->unsignedBigInteger('last_sent_data_id')->nullable();
            $table->string('station_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('push_clients');
    }
}
