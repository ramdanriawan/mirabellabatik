<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo('\App\Pelanggan');
    }

    public function produk()
    {
        return $this->belongsTo('\App\Produk');
    }
}
