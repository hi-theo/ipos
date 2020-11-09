<?php

namespace App\Exports;

use App\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Transaction::all();
        $type = Transaction::distinct('created_at')->select('kode_transaksi', 'total', 'bayar', 'kasir')->get();
        return $type;
    }
    public function headings(): array
    {
        return [
            'kode_transaksi',
            'total',
            'bayar',
            'kasir',
        ];
    }
}
