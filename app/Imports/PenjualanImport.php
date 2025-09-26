<?php

namespace App\Imports;

use App\Models\PenjualanModel;
use Maatwebsite\Excel\Concerns\ToModel;

class PenjualanImport implements ToModel
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

        return new PenjualanModel([
            'kode_toko'          => $row[0],
            'nominal_transaksi'  => $row[1],
        ]);

    }
}
