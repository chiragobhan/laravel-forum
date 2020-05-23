<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
