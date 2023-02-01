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
        $students = Student::all();

        return view('index', [
            'students' => $students,
        ]);
    }

    public function show($id)
    {
        $teacher = Student::find($id)->teacher->name;
        $phone = Student::find($id)->contact->phone;
        $address = Student::find($id)->contact->address;
        $name = Student::find($id)->name;
        $activities = Student::find($id)->activities;
        $students = Teacher::find($id)->students;
        return view('show', [
            'address' => $address,
            'name' => $name,
            'teacher' => $teacher,
            'phone' => $phone,
            'students' => $students,
            'activities' => $activities,

        ]);
    }
}
