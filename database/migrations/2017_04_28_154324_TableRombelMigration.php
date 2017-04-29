<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableRombelMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rombel', function (Blueprint $table) {
            $table->integer('id_kelas')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['id_kelas', 'user_id']);
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
        Schema::dropIfExists('rombel');

    }
}
