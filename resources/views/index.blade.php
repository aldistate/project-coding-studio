<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Show All Data</title>
</head>

<body>
  {{-- ini memakai message.php pada lang/id/message.php --}}
  <h1>{{ __('message.welcome') }}</h1>
  {{-- ini memakai id.json pada folder lang --}}
  <h1>{{ __('Welcome to This Page') }}</h1>
  <p>Locale : {{ App::getLocale() }}</p>
  <a href="{{ route('set_locale', 'en') }}">English</a>
  <a href="{{ route('set_locale', 'id') }}">Indonesia</a>
  <br>

  @if (Auth::check())
    <form action="{{ route('logout') }}" method="post">
      @csrf
      <button type="submit">Logout</button>
    </form>
    <p>Nama : {{ $user->name }}</p>
    <p>E-Mail : {{ $user->email }}</p>
    <p>Role : {{ $user->role }}</p>
    <p>Id : {{ $id }}</p>
  @else
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
  @endif
  <br>
  <p>Ini adalah tabel semua data siswa</p>
  <table border="1px">
    <th>Id</th>
    <th>Nama</th>
    <th>Score</th>
    <th>Action</th>
    @foreach ($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td><a href="{{ route('show', $student->id) }}">{{ $student->name }}</a></td>
        <td>{{ $student->score }}</td>
        <td>
          <form action="{{ route('edit', $student) }}" method="get">
            @csrf
            <button type="submit">Edit</button>
          </form>
          <form action="{{ route('delete', $student) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit">Delete</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>

  <p>Curent Page : {{ $students->currentpage() }}</p>
  <p>Total Data : {{ $students->total() }}</p>
  <p>Data Per-Page : {{ $students->perPage() }}</p>

  {{ $students->links('pagination::bootstrap-4') }}
</body>

</html>