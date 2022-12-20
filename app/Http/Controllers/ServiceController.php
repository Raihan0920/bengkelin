<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServiceExport;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::paginate(5);

        return view('admin.service.index',compact('service'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'nama_service' => 'required',
            'harga_service' => 'required'
        ]);
        Service::create($request->all());

        return redirect()->route('service.index')
                        ->with('Berhasil menambahkan data service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $ar_service = Service::find($id);
        return view('admin.service.detail', compact('ar_service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nama_service' => 'required',
            'harga_service' => 'required'
        ]);

        $service->update($request->all());

        return redirect()->route('service.index')
                        ->with('success','Data Service berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')
                        ->with('success','Data service berhasil dihapus');
    }

    public function servicePDF()
    {
        $service = Service::all();
        $pdf = PDF::loadView('admin.service.servicePDF', ['service'=>$service]);
        return $pdf->download('data_service.pdf');
    }

    public function serviceExcel()
    {
        return Excel::download(new ServiceExport, 'data_service.xlsx');
    }
}
