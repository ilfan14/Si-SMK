<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    //

    protected $table = 'Rombel';
    protected $primaryKey = 'user_id';


    protected $fillable = [
        'id_kelas', 'id_user',
    ];

    public $timestamps = false;
}
