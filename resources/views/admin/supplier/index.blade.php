@extends('admin.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Supplier</h1>
        <p class="mb-4"></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Supplier</h6>
            </div>
            
            <div class="card-body">
            <a href="{{route('supplier.create')}}" class="btn btn-primary"> Tambah Data </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $supplier->nama }}</td>
                                    <td>{{ $supplier->no_telp }}</td>
                                    <td>{{ $supplier->alamat }}</td>
                                    <td>
                                        <form method="POST" action="{{route('supplier.destroy', $supplier->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('supplier.edit', $supplier->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
