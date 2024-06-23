<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = ['nama', 'alamat', 'no_hp', 'user_id', 'kartu_id'];
    public $timestamps = false;
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kartu(){
        return $this->belongsTo(kartu::class);
    }
}
