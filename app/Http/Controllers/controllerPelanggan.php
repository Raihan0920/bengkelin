<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use Illuminate\Support\Facades\DB as PelangganDB;

class controllerPelanggan extends Controller
{
    public function pelanggan(){
        $ar_pelanggan = PelangganDB::table('pelanggans')->get();
        return view('admin.pelanggan.pelanggan', compact('ar_pelanggan'));
    }

    public function pelangganPDF()
    {
        $pelanggan = Pelanggan::all();
        $pdf = PDF::loadView('admin.pelanggan.pelangganPDF', ['pelanggans'=>$pelanggan]);
        return $pdf->download('data_pelanggan.pdf');
    }

    public function pelangganExcel()
    {
        return Excel::download(new PelangganExport, 'data_pelanggan.xlsx');
    }
}
