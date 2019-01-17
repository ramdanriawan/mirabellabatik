<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany('\App\Produk');
    }
}
