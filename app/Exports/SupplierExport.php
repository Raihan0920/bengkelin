<?php

namespace App\Exports;

use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupplierExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_supplier = DB::table('supplier')->select('nama','alamat','no_telp')->get();
      return $ar_supplier;
    }

    public function headings(): array
    {
        return ["Nama Supplier", "Alamat", "Nomor Telepon"];
    }
}
