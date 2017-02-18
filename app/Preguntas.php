<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    protected $table = 'preguntas';

    protected $fillable = [
        'id_tema',
        'notificacion',
        'pregunta',
        'respuesta_1',
        'respuesta_2',
        'respuesta_3',
        'respuesta_4',
        'respuesta',
        'link'
    ];
}
