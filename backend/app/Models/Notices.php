<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
    protected $primaryKey = 'id_notice';

    protected $fillable = [
        'title',
        'paragraph',
        'img',
        'url',
        'fechaPublicacion',
        'horaPublicacion'
    ];
}
