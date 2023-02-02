<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Show All Data</title>
</head>
<body>
  <p>Ini adalah tabel semua data siswa</p>
  <table border="1px">
    <th>Id</th>
    <th>Nama</th>
    <th>Score</th>
    @foreach ($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td><a href="{{ route('show', $student->id) }}">{{ $student->name }}</a></td>
        <td>{{ $student->score }}</td>
      </tr>
    @endforeach
  </table>

  <p>Curent Page : {{ $students->currentpage() }}</p>
  <p>Total Data : {{ $students->total() }}</p>
  <p>Data Per-Page : {{ $students->perPage() }}</p>

  {{ $students->links('pagination::bootstrap-4') }}
</body>
</html>