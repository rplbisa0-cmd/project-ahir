<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'harga',
        'deskripsi',
        'gambar',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'integer',
        ];
    }

    public function detailTransaksis(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
