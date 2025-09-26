<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KodeTokoModel extends Model
{
    protected $table = 'table_a';
    protected $primaryKey = 'kode_toko_baru';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_toko_baru', 'kode_toko_lama'];
    public $timestamps = false;
}
