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
            $table->enum('job', ['guru', 'siswa', 'staf'])->nullable();
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('status')->default('nonaktif');
            $table->string('email')->unique();
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
    }
}
