<!DOCTYPE html>
<html>
<head>
  <title>Data Motor</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <h3 align="center">Data Motor</h3>
  <table border="1" cellpadding="10" align="center">
    <thead>
      <tr>
        <th>No</th>
        <th>Jenis Motor</th>
        <th>Nomor Motor</th>
        <th>Merek Motor</th>
      </tr>
    </thead>
    <tbody>
      @php $no= 1; @endphp
      @foreach($motor as $row)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->jenis_motor }}</td>
        <td>{{ $row->nomor_motor }}</td>
        <td>{{ $row->merek_motor }}</td>
      @endforeach
    </tbody>
  </table>
</body>
</html>
