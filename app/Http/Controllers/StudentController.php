<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use SebastianBergmann\CodeUnit\FunctionUnit;

class StudentController extends Controller
{
    public function index()
    {
        // $students = Student::all();
        $students = Student::paginate(2);

        return view('index', [
            'students' => $students,
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
}
