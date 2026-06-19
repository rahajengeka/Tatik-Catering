<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus'; // kalau tabelnya beda nama, ganti

    // INI YANG WAJIB ADA! TANPA INI CRUD GAK JALAN!
    protected $fillable = [
        'nama_menu',
        'deskripsi',
        'gambar',
        'is_active'
    ];

    // Biar is_active jadi true/false (bukan 1/0)
    protected $casts = [
        'is_active' => 'boolean',
    ];
}