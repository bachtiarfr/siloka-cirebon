<?php

namespace App\Exports;

use DB;

use App\AlatStandar;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataLaporan implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return AlatStandar::all();
        $data = DB::table('lab-cirebon.alat_standar')
        ->select(
            'nama_alat_ukur',
            'merk',
            'nomor_seri',
            'kapasitas',
            'kelas',
            'jumlah',
            'internal',
            'eksternal'
        )
        ->get();
        return $data ;
    }

    
    public function headings(): array
    {
        return [
            'Nama Alat',
            'Merk dan Spesifikasi',
            'Nomor Seri',
            'Kapasitas',
            'Kelas',
            'Jumlah Alat',
            'Internal',
            'Eksternal',
        ];
        // $sheet->setAutoSize(true);
    }
}
