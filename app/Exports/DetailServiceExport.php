<?php

namespace App\Exports;

use App\Models\DetailService;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DetailServiceExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $ar_detailservice = DB::table('detail_service')
        ->join('pelanggan', 'pelanggan.id', '=', 'detail_service.pelanggan_id')
        ->join('service', 'service.id', '=', 'detail_service.service_id')
        ->join('montir', 'montir.id', '=', 'detail_service.montir_id')
        ->join('spare_part', 'spare_part.id', '=', 'detail_service.spare_part_id')
        ->select('pelanggan.nama_pelanggan', 'service.nama_service',
                 'montir.nama', 'spare_part.nama_sparepart',
                 'tanggal_service', 'jam_masuk', 'keluhan', 'total_harga')
        ->get();
        return $ar_detailservice;
    }

    public function headings(): array
    {
        return ["Nama Pelanggan", "Nama Service", "Nama Montir", "Nama Sparepart", "Tanggal Service", "Jam Masuk", "Keluhan", "Total Harga"];
    }
}
