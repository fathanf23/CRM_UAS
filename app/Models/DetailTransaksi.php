<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $fillable = ['qty', 'harga_total', 'transaksi_id', 'produk_id'];
    public $timestamps = false;
    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }
    public function produk ()
    {
        return $this->belongsTo(produk::class);
    }
   
}