<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Filter</title>
</head>
<body>
  <p>Ini adalah tabel siswa yang nilah scorenya di atas 75</p>
  <table border="1px">
    <th>Id</th>
    <th>Nama</th>
    <th>Score</th>
    @foreach ($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->score }}</td>
      </tr>
    @endforeach
  </table>
</body>
</html>