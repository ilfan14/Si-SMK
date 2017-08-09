<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_pengguna extends Model
{
    protected $table = 'data_pengguna';
    protected $primaryKey = 'id';


    protected $fillable = [
        'alamat', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'nama_ortu_wali', 'no_hp_ortu', 
    ];

    public $timestamps = false;


}
