<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableNilaiMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->string('kode_mapel')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('nilai')->unsigned();
            $table->string('keterangan')->nullable();

            $table->foreign('kode_mapel')->references('kode_mapel')->on('mapel')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
