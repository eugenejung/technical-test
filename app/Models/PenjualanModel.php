<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    protected $table = 'table_b';
    protected $primaryKey = 'kode_toko';
    public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = ['kode_toko', 'nominal_transaksi'];
    public $timestamps = false; 
}
