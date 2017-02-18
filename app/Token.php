<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'token';

    protected $fillable = [
        'id',
        'id_user',
        'token',
        'degree',
        'expira',
        'numero',
        'create_at'
    ];
}
