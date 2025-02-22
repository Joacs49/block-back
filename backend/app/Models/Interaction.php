<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    public $table = 'interactions';
    protected $primaryKey = 'id_interaction';

    protected $fillable = [
        'views',
        'likes'
    ];

    public $timestamps = false;

}
