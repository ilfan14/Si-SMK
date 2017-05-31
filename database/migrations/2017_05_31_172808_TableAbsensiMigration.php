<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableAbsensiMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id_absensi');
            $table->integer('user_id')->unsigned();
            $table->integer('id_kelas')->unsigned();
            $table->string('ketabsensi');
            $table->dateTime('tgl_absensi')->default(DB::raw('CURRENT_TIMESTAMP'));


            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')
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
        //
        Schema::dropIfExists('absensi');
    }
}
