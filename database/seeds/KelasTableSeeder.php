<?php

use Illuminate\Database\Seeder;
use App\Kelas;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$buatkelas=[
        		[
                    'nama_kelas' => 'X TKJ 1'

                ],
                [
                    'nama_kelas' => 'X TKJ 2'
        		]
        		
        ];

        foreach ($buatkelas as $key => $value) {
        	Kelas::create($value);
        }

    }
}
