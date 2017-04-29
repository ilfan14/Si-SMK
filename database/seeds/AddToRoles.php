<?php

use Illuminate\Database\Seeder;
use App\User;

class AddToRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // beri hak akses default user pertama menjadi admin

        $admin = User::where('id', '=', '1')->first();
        $admin->attachRole(1);
        
        // hak akses siswa
        $siswa = User::where('job','=','siswa')->get();

        foreach ($siswa as $key => $value) {
            $value->attachRole(3);
        }

        $guru = User::where('job','=','guru')->get();

        foreach ($guru as $key => $value) {
            $value->attachRole(2);
        }


    }
}
