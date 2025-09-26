<?php

namespace App\Exports;

use App\Models\PenjualanModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PenjualanModel::all();
    }
    public function headings(): array
    {
        return [
            'Kode Toko',
            'Nominal Transaksi',
        ];
    }
}
