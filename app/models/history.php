<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table = 'history';


    protected $fillable = [

        'type_document',
        'document',
        'url',
        'observation'

    ];
}
