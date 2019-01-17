<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo('\App\Kategori');
    }

    public function jenis_bahan()
    {
        return $this->belongsTo('\App\JenisBahan');
    }

    public function ukuran_produks()
    {
        return $this->hasMany('\App\UkuranProduk');
    }
}
