<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

/**
 * CONTROLLER (C in MVC) — created with:
 *     php artisan make:controller StudentController --resource
 *
 * A RESOURCE controller has the 7 standard CRUD methods.
 * One line in routes/web.php wires all 7:  Route::resource('students', StudentController::class);
 *
 *  Verb       URI                     Method    Route name
 *  GET        /students               index     students.index
 *  GET        /students/create        create    students.create
 *  POST       /students               store     students.store
 *  GET        /students/{student}     show      students.show
 *  GET        /students/{student}/edit edit     students.edit
 *  PUT/PATCH  /students/{student}     update    students.update
 *  DELETE     /students/{student}     destroy   students.destroy
 */
class StudentController extends Controller
{
    // GET /students — list all students
    public function index()
    {
        $students = Student::orderBy('roll_no')->get();   // MODEL: SELECT * FROM students ORDER BY roll_no
        return view('students.index', compact('students')); // VIEW: resources/views/students/index.blade.php
    }

    // GET /students/create — show the empty form
    public function create()
    {
        return view('students.create');
    }

    // POST /students — save the form, then REDIRECT
    public function store(Request $request)
    {
        $data = $request->validate([
            'roll_no'  => 'required|unique:students',
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:students',
            'semester' => 'required|integer|between:1,8',
            'cgpa'     => 'nullable|numeric|between:0,10',
        ]);

        $student = Student::create($data);

        return redirect()->route('students.show', $student)
                         ->with('status', "Student {$student->name} added.");
    }

    // GET /students/{student} — IMPLICIT route model binding:
    // the type-hint "Student $student" + the {student} segment make Laravel run
    // Student::findOrFail($id) for us. A wrong id gives 404 automatically.
    public function show(Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    // GET /students/{student}/edit — form filled with current values
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    // PUT /students/{student} — save changes, then redirect
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:students,email,'.$student->id,
            'semester' => 'required|integer|between:1,8',
            'cgpa'     => 'nullable|numeric|between:0,10',
        ]);

        $student->update($data);

        return redirect()->route('students.show', $student)->with('status', 'Changes saved.');
    }

    // DELETE /students/{student}
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('status', "Deleted {$student->name}.");
    }
}
