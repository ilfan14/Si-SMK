<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->integer('data_pengguna_id')->unsigned()->nullable();
            $table->enum('job', ['Guru', 'Siswa', 'Orang Tua', 'Admin'])->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
            $table->enum('status', ['nonaktif', 'aktif'])->default('nonaktif');
            $table->string('email');
            $table->string('password');
            $table->string('picture')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::disableForeignKeyConstraints();

    }
}
