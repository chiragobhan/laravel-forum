<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded = [
        'id', 'title', 'created_at', 'updated_at',
    ];
}
