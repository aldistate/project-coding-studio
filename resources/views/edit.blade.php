<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit</title>
</head>

<body>
  @if ($errors->any())
    @foreach ($errors->all() as $error)
      <b style="color: red">{{ $error }}</b> <br>
    @endforeach
  @endif
  <form action="{{ route('update', $student) }}" method="post">
    @method('patch')
    @csrf
    <input type="text" name="name" value="{{ $student->name }}">
    <input type="number" name="score" value="{{ $student->score }}">
    <select name="teacher_id">
      @foreach ($teachers as $teacher)
      @if (old('teacher_id', $student->teacher_id == $teacher->id))
        <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
      @else
        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
      @endif
      @endforeach
    </select>
    <button type="submit">Update</button>
  </form>
</body>

</html>