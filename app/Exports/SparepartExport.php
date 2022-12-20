<?php

namespace App\Exports;

use App\Models\Sparepart;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SparepartExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_sparepart = DB::table('spare_part')->select('nama_sparepart','merek','harga')->get();
      return $ar_sparepart;
    }

    public function headings(): array
    {
        return ["Nama Sparepart", "Merek", "Harga"];
    }
}
