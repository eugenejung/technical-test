<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterSalesModel extends Model
{
    protected $table = 'table_d';
    protected $primaryKey = 'kode_sales';
    public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = ['kode_sales', 'nama_sales'];
    public $timestamps = false;
}
