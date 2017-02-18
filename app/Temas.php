<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{

    protected $table = 'temas';

    protected $fillable = [
        'id_materia',
        'title',
        'content',
        'link'
    ];
}
