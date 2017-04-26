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

        $user = User::where('id', '=', '1')->first();
        $user->attachRole(1);
        


    }
}
