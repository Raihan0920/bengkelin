<?php

namespace App\Exports;

use App\Models\Motor;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MotorExport implements FromCollection, WithHeadings
{
    public function collection()
    {
      $ar_motor = DB::table('motor')->select('jenis_motor','nomor_motor','merek_motor')->get();
      return $ar_motor;
    }

    public function headings(): array
    {
        return ["Jenis Motor", "Nomor Motor", "Merek Motor"];
    }
}
