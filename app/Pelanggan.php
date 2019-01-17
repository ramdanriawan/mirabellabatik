<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $guarded = [];

    public function kota()
    {
        return $this->belongsTo('\App\Kota');
    }

    public function getAuthPassword() 
    {
        return $this->password;
	}
}
