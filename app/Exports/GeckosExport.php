<?php

namespace App\Exports;

use App\Models\Ipnu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GeckosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Ipnu::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Jabatan',
            'Kelahiran',
            'Alamat',
            'Periode1',
            'Periode2',
            'Deleted At',
            'Created At',
            'Updated At',
        ];
    }
}
