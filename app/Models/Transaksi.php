<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['namaPaket','harga','nama','noTlp','nominal','user_id'];

    function produk() {
        return $this->hasMany(Produk::class);
    }
}
