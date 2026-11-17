<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $fillable = [
        'tanggal',
        'total_harga',
        'pembayaran',
        'kembalian',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'datetime',
            'total_harga' => 'integer',
            'pembayaran' => 'integer',
            'kembalian' => 'integer',
        ];
    }

    public function details(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
