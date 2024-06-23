<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $filleable = [
        'kd_produk',
        'nm_produk',
        'harga_produk',
        'foto',
    ];
    public function detail_transaksi()
    {
        return $this->hasMany(detail_transaksi::class);
    }
}
