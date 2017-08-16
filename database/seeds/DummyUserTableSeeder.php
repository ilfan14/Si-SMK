<?php

use Illuminate\Database\Seeder;
use App\User;
use App\data_pengguna;

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
                    'username' => 'admin',
                    'name' => 'Admin',
                    'job' => 'Admin',
                    'email' => 'admin@a.com',
                    'status' => 'aktif',
                    'password' => bcrypt('admin')

                ],
                [
                    'username' => 'guru',
                    'name' => 'Guru',
                    'job' => 'Guru',
                    'email' => 'guru@a.com',
                    'status' => 'aktif',
                    'password' => bcrypt('guru')

                ],
                [
        			'username' => '111',
        			'name' => 'Siswa',
                    'job' => 'Siswa',
        			'email' => 'siswa@a.com',
                    'status' => 'aktif',
        			'password' => bcrypt('user')

        		],
        		[
        			'username' => '222',
        			'name' => 'Ilfan User',
                    'job' => 'Siswa',
        			'email' => 'ilfanUser@a.com',
                    'status' => 'aktif',
        			'password' => bcrypt('user')

        		]
        		
        ];

        foreach ($buatuser as $key => $value) {
        	$createuser = User::create($value);

            $datapengguna = new data_pengguna([
                'alamat' => 'Alamat Default',
                'tempat_lahir' => 'Tempat Lahir'
            ]);
            $datapengguna->save();

            $relasdatapenggunauser = User::find($createuser->id);
            $relasdatapenggunauser->datapengguna()->associate($datapengguna);
            $relasdatapenggunauser->save();
        }


    }
}
