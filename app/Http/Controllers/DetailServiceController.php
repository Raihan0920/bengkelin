<?php

namespace App\Http\Controllers;

use App\Models\DetailService;
use App\Models\Pelanggan;
use App\Models\Montir;
use App\Models\Sparepart;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DetailDB;

class DetailServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ar_detailService = DetailService::paginate(5);
      
        return view('admin.detail_service.index',compact('ar_detailService'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function show(DetailService $detailService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailService $detailService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailService $detailService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailService  $detailService
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailService $detailService)
    {
        //
    }
}
