<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFtpClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ftp_clients', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('is_active')->default(true);
            $table->string('host');
            $table->integer('port')->default(21);
            $table->string('directory')->nullable();
            $table->string('login');
            $table->string('password');
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
        Schema::dropIfExists('ftp_clients');
    }
}
