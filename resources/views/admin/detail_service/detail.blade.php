@extends('admin.master')
@section('content')
    <div class="col-md-auto">
        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="name" class="form-control" placeholder="id" value="{{$ar_detailservice->pelanggan->nama_pelanggan}}"readonly>
        </div>

        <div class="form-group">
            <label>Nama Service</label>
            <input type="text" name="name" class="form-control" placeholder="nama" value="{{$ar_detailservice->service->nama_service}}"readonly>
        </div>

        <div class="form-group">
            <label>Nama Montir</label>
            <input type="text" name="name" class="form-control" placeholder="nama" value="{{$ar_detailservice->montir->nama}}"readonly>
        </div>

        <div class="form-group">
            <label>Nama Sparepart</label>
            <input type="text" name="name" class="form-control" placeholder="nama" value="{{$ar_detailservice->spare_part->nama_sparepart}}"readonly>
        </div>

        <div class="form-group">
            <label>Tanggal Service</label>
            <input type="text" name="name" class="form-control" placeholder="gender" value="{{$ar_detailservice->tanggal_service}}"readonly>
        </div>

        <div class="form-group">
            <label>Jam Masuk</label>
            <input type="text" name="name" class="form-control" placeholder="notelp" value="{{$ar_detailservice->jam_masuk}}"readonly>
        </div>

        <div class="form-group">
            <label>Keluhan</label>
            <input type="text" name="name" class="form-control" placeholder="alamat" value="{{$ar_detailservice->keluhan}}"readonly>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="name" class="form-control" placeholder="alamat" value="{{$ar_detailservice->total_harga}}"readonly>
        </div>

        <a href="{{ url('/montir') }}">
        << </a>
    </div>

@endsection
