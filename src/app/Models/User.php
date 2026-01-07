<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name'];
    public $timestamps = false;
    protected $hidden = [
        'created_at',
    ];
}
