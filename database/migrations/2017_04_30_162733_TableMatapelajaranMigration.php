<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableMatapelajaranMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create table kelas
        Schema::create('mapel', function (Blueprint $table) {
            $table->increments('id_mapel');
            $table->string('kode_mapel')->unique();
            $table->string('nama_mapel')->nullable();
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
        Schema::dropIfExists('mapel');
    }
}
