<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';


    protected $fillable = [
        'id_kelas', 'nama_kelas',
    ];

    public $timestamps = false;

    public function listkelas()
    {
    	return Kelas::all();
    }
}
