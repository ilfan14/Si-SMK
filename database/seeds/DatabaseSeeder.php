<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(DummyUserTableSeeder::class);
        $this->call(AddToRoles::class);
        $this->call(KelasTableSeeder::class);
    }
}
