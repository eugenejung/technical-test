<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaSalesModel extends Model
{
    protected $table = 'table_c';
    protected $primaryKey = 'kode_toko';
    public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = ['kode_toko', 'area_sales'];
    public $timestamps = false;
}
