<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smsgateway extends Model
{
    //
    protected $table = 'smsgateway';

    protected $fillable = [
        'notujuan', 'isipesan', 'status', 
    ];

}
