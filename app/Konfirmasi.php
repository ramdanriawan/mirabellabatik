<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('\App\Order');
    }
    
    public function pelanggan()
    {
        return $this->belongsTo('\App\Pelanggan');
    }

    public function bank()
    {
        return $this->belongsTo('\App\Bank');
    }
}
