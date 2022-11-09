<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
    	'name', 'status', 'user_id', 'kendaraan_id'
    ];
}
