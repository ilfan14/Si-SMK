<?php

use Illuminate\Database\Seeder;
use App\User;

class DummyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $buatuser=[
        		[
        			'username' => '111',
        			'name' => 'Ilfan Admin',
        			'email' => 'ilfan@a.com',
        			'password' => bcrypt('sikatasik')

        		],
        		[
        			'username' => '222',
        			'name' => 'Ilfan User',
        			'email' => 'ilfanUser@a.com',
        			'password' => bcrypt('sikatasik')

        		]
        		
        ];

        foreach ($buatuser as $key => $value) {
        	User::create($value);
        }
    }
}
