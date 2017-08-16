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
        			'description' => 'Deskprisi Role Admin'

        		],
        		[
        			'name' => 'Guru',
        			'display_name' => 'Display Roles Listing Guru',
        			'description' => 'Deskprisi Role Guru'

        		],
        		[
        			'name' => 'Siswa',
        			'display_name' => 'Display Roles Listing Siswa',
        			'description' => 'Deskprisi Role Siswa'

        		],
                [
                    'name' => 'Orang Tua',
                    'display_name' => 'Display Roles Listing Orang Tua',
                    'description' => 'Deskprisi Role Orang tua'

                ]
        ];

        foreach ($jenisakun as $key => $value) {
        	Role::create($value);
        }

        
    }
}
