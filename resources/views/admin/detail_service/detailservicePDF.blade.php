<!DOCTYPE html>
<html>
<head>
  <title>Data Detail Service</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h3 align="center">Data Detail Service</h3>
  <table border="1" cellpadding="10" align="center">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Nama Service</th>
        <th>Nama Montir</th>
        <th>Nama Sparepart</th>
        <th>Tanggal Service</th>
        <th>Jam Masuk</th>
        <th>Keluhan</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($detailservice as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->pelanggan->nama_pelanggan }}</td>
        <td>{{ $row->service->nama_service }}</td>
        <td>{{ $row->montir->nama }}</td>
        <td>{{ $row->spare_part->nama_sparepart }}</td>
        <td>{{ $row->tanggal_service }}</td>
        <td>{{ $row->jam_masuk }}</td>
        <td>{{ $row->keluhan }}</td>
        <td>{{ $row->total_harga }}</td>
      @endforeach
    </tbody>
  </table>
</body>
</html>
