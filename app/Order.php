<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo('\App\Pelanggan');
    }

    public function kota()
    {
        return $this->belongsTo('\App\Kota');
    }

    public function orderDetail()
    {
        return $this->hasMany('\App\OrderDetail');
    }

    public function kurir()
    {
        return $this->belongsTo('\App\Kurir');
    }

    public function resi()
    {
        return $this->hasOne('\App\Resi');
    }

    public function order_detail()
    {
        return $this->hasMany('\App\OrderDetail');
    }
}
