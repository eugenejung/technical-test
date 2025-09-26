<?php

namespace App\Imports;

use App\Models\AreaSalesModel;
use Maatwebsite\Excel\Concerns\ToModel;

class AreaSalesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0] === 'kode_toko') {
            return null;
        }
        
        return new AreaSalesModel([
            'kode_toko'          => $row[0],
            'area_sales'  => $row[1],
        ]);
    }
}
