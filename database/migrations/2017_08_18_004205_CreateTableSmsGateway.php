<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSmsGateway extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smsgateway', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notujuan');
            $table->string('isipesan');
            $table->enum('status', ['Terkirim', 'Pending'])->default('Pending');
            // disable temporary
            // $table->integer('kelompok_sms')->unsigned()->nullable();
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
        Schema::dropIfExists('smsgateway');

    }
}
