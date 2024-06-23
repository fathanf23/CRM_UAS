<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = [
        'tgl_transaksi',
        'qty',
        'harga',
        'harga_total',
        'pelanggan_id',
        'produk_id',
    ];

    /**
     * Get all of the customer for the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    /**
     * Get all of the kurir for the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
    /**
     * Get all of the detail_transaksi for the Transaksi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    }

