<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTableInformasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('informasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('isi')->nullable();
            $table->integer('pembuat_user_id')->unsigned();
            $table->enum('untuk', ['Publik', 'Siswa', 'Orang Tua', 'Guru'])->nullable();
            $table->timestamps();

            $table->foreign('pembuat_user_id')->references('id')->on('users')
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
        Schema::dropIfExists('data_pengguna');
    }
}
