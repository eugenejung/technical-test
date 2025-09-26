<?php

namespace App\Imports;

use App\Models\MasterSalesModel;
use Maatwebsite\Excel\Concerns\ToModel;

class MasterSalesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[0] === 'kode_sales') {
            return null;
        }

        return new MasterSalesModel([
            'kode_sales'          => $row[0],
            'nama_sales'  => $row[1],
        ]);
    }
}
