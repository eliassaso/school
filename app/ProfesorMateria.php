<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfesorMateria extends Model
{
    protected $table = 'profesor_materia';

    protected $fillable = [
        'id_materia',
        'id_profesor'
    ];

}
