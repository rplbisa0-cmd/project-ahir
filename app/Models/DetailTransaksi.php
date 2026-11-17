<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
    protected $fillable = [
        'transaksi_id',
        'menu_id',
        'nama_menu',
        'harga',
        'jumlah',
        'subtotal',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'integer',
            'jumlah' => 'integer',
            'subtotal' => 'integer',
        ];
    }

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
