<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $jenisakun=[
        		[
        			'name' => 'Admin',
        			'display_name' => 'Display Roles Listing Admin',
        			'description' => 'Deskprisi RoleRead'

        		],
        		[
        			'name' => 'Guru',
        			'display_name' => 'Display Roles Listing Guru',
        			'description' => 'Deskprisi RoleWrite'

        		],
        		[
        			'name' => 'Siswa',
        			'display_name' => 'Display Roles Listing Siswa',
        			'description' => 'Deskprisi RoleCreate'

        		]
        ];

        foreach ($jenisakun as $key => $value) {
        	Role::create($value);
        }

    }
}
