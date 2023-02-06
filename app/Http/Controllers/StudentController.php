<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Builder\Function_;
use SebastianBergmann\CodeUnit\FunctionUnit;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();

        // $students = Student::all();
        $students = Student::paginate(2);

        return view('index', [
            'students' => $students,
            'user' => $user,
            'id' => $id,
        ]);
    }

    public function filter()
    {
        $students = Student::where('score', '>=', 75)->get();
        return view('filter', compact('students'));
    }

    public function show($id)
    {
        $students = Student::find($id);
        $teacher = Teacher::find($id);
        return view('show', [
            'students' => $students,
            'teacher' => $teacher,
        ]);
    }

    public function create()
    {
        return view('create', [
            'teachers' => Teacher::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'score' => 'required',
            'teacher_id' => 'required',
        ]);

        Student::create([
            'name' => $request->name,
            'score' => $request->score,
            'teacher_id' => $request->teacher_id,
        ]);

        return Redirect::route('index');
    }

    public function edit(Student $student)
    {
        return view('edit', [
            'student' => $student,
            'teachers' => Teacher::all(),
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'score' => 'required',
            'teacher_id' => 'required',
        ]);

        $student->update([
            'name' => $request->name,
            'score' => $request->score,
            'teacher_id' => $request->teacher_id,
        ]);

        return Redirect::route('index');
    }

    public function delete(Student $student)
    {
        $student->delete();
        return Redirect::route('index');
    }
}
