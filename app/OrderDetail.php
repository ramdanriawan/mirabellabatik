<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function produk()
    {
        return $this->belongsTo('\App\Produk');
    }

    public function order()
    {
        return $this->belongsTo('\App\Order');
    }

}
