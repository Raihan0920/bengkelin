<?php

namespace App\Exports;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiceExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_service = DB::table('service')->select('nama_service','harga_service')->get();
      return $ar_service;
    }

    public function headings(): array
    {
        return ["Nama", "Harga"];
    }
}
