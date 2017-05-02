<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';



    protected $fillable = [
        'id_nilai','kode_mapel', 'user_id', 'nilai', 'keterangan'
    ];

    public $timestamps = false;


}
