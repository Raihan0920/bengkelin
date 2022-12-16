@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Tambah Sparepart </h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('sparepart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="NAMA">Supplier</label>
                            <select class="form-control main w-25" name="suppliyer_idsuppliyer">
                                    <option selected>-- Pilih supplier --</option>
                                    @foreach ($nama_supplier as $sp)
                                    <option value="{{$sp->id}}">{{$sp->nama}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_sparepart" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" name="merek" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Upload Foto</label>
                            <input type="file" name="foto_barang" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <a class="btn btn-info" title="Kembali" href="{{ route('sparepart.index') }}">
                                Kembali 
                            </a>
                            <button type="submit" class="btn btn-primary" onclick="myallert()"> Simpan </button>
                        </div>
                        <div class="form-group mt-2">
                            
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function myallert() {
                    // document.getElementById('nomor_telepon').value = document.getElementById('nomor_telepon').value.replace(/\D/g,
                    //     '') + '**********';
                    swal({
                            title: "Data Sparepart",
                            text: "Anda Berhasil Menambahkan Data Sparepart!",
                            icon: "success",
                            dangerMode: true,
                        })
                        .then(willDelete => {
                            if (willDelete) {
                                swal("Good Job!", "Anda berhasil menambahkan data sparepart!", "success");
                            }
                        });
                }
            </script>
        </div>
    </section>
@endsection
