<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'users';        // PAKAI TABEL users
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'username',       // kalau sudah ditambah
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}