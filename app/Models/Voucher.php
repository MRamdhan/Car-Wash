<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }
}
