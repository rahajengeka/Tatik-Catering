<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $primaryKey = 'id_promo';

    protected $fillable = [
        'judul_promo',
        'diskon_persen',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'gambar',
        'is_active'
    ];

    protected $casts = [
        'tanggal_mulai'  => 'date',
        'tanggal_selesai'=> 'date',
        'is_active'      => 'boolean',   // INI YANG BIKIN SEMUA JADI HIDUP!!!
    ];
}