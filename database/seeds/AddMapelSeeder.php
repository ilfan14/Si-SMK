<?php

use Illuminate\Database\Seeder;
use App\Mapel;

class AddMapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mapeldummy =[
        		[
                    'kode_mapel' => 'KDMP1',
                    'nama_mapel' => 'Bahasa indonesia'

                ],
                [
                    'kode_mapel' => 'KDMP2',
                    'nama_mapel' => 'Bahasa Inggris'
        		]
        		
        ];

        foreach ($mapeldummy as $key => $value) {
        	Mapel::create($value);
        }
    }
}
