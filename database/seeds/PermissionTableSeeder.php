<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $hakakses=[
        		[
        			'name' => 'RoleRead',
        			'display_name' => 'Display Roles Listing RoleRead',
        			'description' => 'Deskprisi RoleRead'

        		],
        		[
        			'name' => 'RoleWrite',
        			'display_name' => 'Display Roles Listing RoleWrite',
        			'description' => 'Deskprisi RoleWrite'

        		],
        		[
        			'name' => 'RoleCreate',
        			'display_name' => 'Display Roles Listing RoleCreate',
        			'description' => 'Deskprisi RoleCreate'

        		]
        ];


        foreach ($hakakses as $key => $value) {
        	Permission::create($value);
        }
    }
}
