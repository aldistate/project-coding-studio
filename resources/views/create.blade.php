<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create</title>
</head>

<body>
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <b style="color: red">{{ $error }}</b> <br>
    @endforeach
  @endif
  <form action="{{ route('store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="name">
    <input type="number" name="score" placeholder="score">
    <select name="teacher_id">
      @foreach ($teachers as $teacher)
        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
      @endforeach
    </select>
    <button type="submit">Add</button>
  </form>
</body>

</html>