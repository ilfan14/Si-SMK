<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    //
    protected $table = 'Informasi';

    protected $fillable = [
        'judul', 'isi', 'user_id', 'untuk',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }


}
