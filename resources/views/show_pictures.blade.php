<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Show Pictures</title>
</head>
<body>
  <p>Nama : {{ $picture->name }}</p>
  <p>Path : {{ $picture->path }}</p>
  <img src="{{ $url }}" alt="{{ $picture->name }}" height="200px">
  <form action="{{ route('delete_picture', $picture) }}" method="post">
    @method('delete')
    @csrf
    <button type="submit">Delete</button>
  </form>
  <form action="{{ route('copy_picture', $picture) }}" method="get">
    <button type="submit">Copy</button>
  </form>
  <form action="{{ route('move_picture', $picture) }}" method="get">
    <button type="submit">Move</button>
  </form>
</body>
</html>