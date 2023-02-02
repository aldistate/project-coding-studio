<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contoh</title>
</head>
<body>
  <p>Hai {{ $students->name }}, sudah lama yaah kita tidak bertemu dan ngoding bareng</p>
  <p>Alamat {{ $students->name }} adalah : {{ $students->contact->address }}</p>
  <p>Nomor HP {{ $students->name }} adalah : {{ $students->contact->phone }}</p>
  <p>Wali Kelas {{ $students->name }} adalah : {{ $students->teacher->name }}</p>
  <p>Score {{ $students->name }} ialah : {{ $students->score }}</p>
  <br>
  <p>Murid - murid dari Guru {{ $students->teacher->name }} ialah :</p>
  @foreach ($teacher->students as $student)
    <ul>
      <li>
        {{ $student->name }}
      </li>
    </ul>
  @endforeach
  <br>
  <p>Adapun aktifitas - aktifitas disekolah yang diikuti oleh {{ $students->name }}, yaitu : </p>
  @foreach ($students->activities as $student)
    <ul>
      <li>
        {{ $student->name }}
      </li>
    </ul>
  @endforeach

  {{-- @if ($name == 'Aldi')
    <p>Hai {{ $name }}, sudah lama sekali anda tidak ngoding seperti dulu, tetap semangat yaah!!</p>
  @else
    <p>Hello, {{ $name }}</p>
  @endif

  @for ($i = 1; $i <= 10; $i++)
      <ul>
        <li>
          Test {{ $i }}
        </li>
      </ul>
  @endfor --}}
</body>
</html>