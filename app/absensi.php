<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    //
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';



    protected $fillable = [
        'user_id', 'id_kelas', 'ket_absensi', 'tgl_absensi', 
    ];

    public $timestamps = false;
}
