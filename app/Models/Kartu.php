<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kartu extends Model
{
    use HasFactory;
    protected $table = 'kartu';
    protected $fillable = ['kode', 'nama', 'diskon'];
    public $timestamps = false;
    public function pelanggan()
    {
        return $this->BelongTo(pelanggan::class);
    }
   
}
