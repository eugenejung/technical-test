<?php

namespace App\Exports;

use App\Models\KodeTokoModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KodeTokoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KodeTokoModel::all();
    }

    public function headings(): array
    {
        return [
            'Kode Toko Baru',
            'Kode Toko Lama',
        ];
    }
}
