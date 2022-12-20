<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MotorExport;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motor = Motor::paginate(5);

        return view('admin.motor.index', compact('motor'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.motor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_motor' => 'required',
            'nomor_motor' => 'required',
            'merek_motor' => 'required'
        ]);
        Motor::create($request->all());

        return redirect()->route('motor.index')
            ->with('Berhasil menambahkan data Motor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function show(Motor $motor)
    {
        $ar_motor = Motor::find($id);
        return view('admin.motor.detail', compact('ar_motor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function edit(Motor $motor)
    {
        return view('admin.motor.edit', compact('motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'jenis_motor' => 'required',
            'nomor_motor' => 'required',
            'merek_motor' => 'required'
        ]);

        $motor->update($request->all());

        return redirect()->route('motor.index')
            ->with('success', 'Data Motor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motor $motor)
    {
        $motor->delete();
        return redirect()->route('motor.index')
            ->with('success', 'Data Motor berhasil dihapus');
    }

    public function motorPDF()
    {
        $motor = Motor::all();
        $pdf = PDF::loadView('admin.motor.motorPDF', ['motor'=>$motor]);
        return $pdf->download('data_motor.pdf');
    }

    public function motorExcel()
    {
        return Excel::download(new MotorExport, 'data_motor.xlsx');
    }
}
