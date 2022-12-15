@extends('admin.master')

@section('content')
    <section>
        <div class="container mt-5">
            <h1> Tambah Sparepart </h1>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{ route('sparepart.update', $sparepart->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="NAMA">Supplier</label>
                            <select class="form-control main w-25" name="suppliyer_idsuppliyer">
                                    <option selected>-- Pilih supplier --</option>
                                    @foreach ($ar_supplier as $sp)
                                    @php $sel = ($sp->id == $sparepart->suppliyer_idsuppliyer) ? 'selected' : ''; @endphp
                                    <option value="{{$sp->id}}" {{$sel}} >{{$sp->nama}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_sparepart" class="form-control" value="{{$sparepart->nama_sparepart}}">
                        </div>
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" name="merek" class="form-control" value="{{$sparepart->merek}}">
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{$sparepart->harga}}">
                        </div>
                        <div class="form-group mt-2">
                            <a class="btn btn-info" title="Kembali" href=" {{ route('sparepart.index') }}">
                                <i class="bi bi-arrow-left-square"> Kembali</i>
                            </a>
                            <button type="submit" class="btn btn-primary" onclick="myallert()"> Ubah </button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function myallert() {
                    // document.getElementById('nomor_telepon').value = document.getElementById('nomor_telepon').value.replace(/\D/g,
                    //     '') + '**********';
                    swal({
                            title: "Are you sure?",
                            text: "Are you sure that you want to leave this page?",
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
