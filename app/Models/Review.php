<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'id_review';

    protected $fillable = [
        'nama_pelanggan',
        'bintang',
        'komentar',
        'is_visible'
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'bintang'    => 'integer',
    ];

    public function getRouteKeyName()
    {
        return 'id_review';
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeHidden($query)
    {
        return $query->where('is_visible', false);
    }
}