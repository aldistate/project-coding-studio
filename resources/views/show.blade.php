<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contoh</title>
</head>
<body>
  <p>Hai {{ $name }}, sudah lama yaah kita tidak bertemu dan ngoding bareng</p>
  <p>Alamat {{ $name }} adalah : {{ $address }}</p>
  <p>Nomor HP {{ $name }} adalah : {{ $phone }}</p>
  <p>Wali Kelas {{ $name }} adalah : {{ $teacher }}</p>
  <br>
  <p>Murid - murid dari Guru {{ $teacher }} ialah :</p>
  @foreach ($students  as $student)
    <ul>
      <li>
        {{ $student->name }}
      </li>
    </ul>
  @endforeach
  <br>
  <p>Adapun aktifitas - aktifitas disekolah yang diikuti oleh {{ $name }}, yaitu : </p>
  @foreach ($activities as $activity)
    <ul>
      <li>
        {{ $activity->name }}
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