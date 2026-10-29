<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ROUTES  — the front door of a Laravel app
|--------------------------------------------------------------------------
| See every route:   php artisan route:list
*/

// Lesson 1: a closure that returns a view
Route::get('/', function () {
    return view('home');
});

// Lesson 2: a route with a parameter, handled by a closure
Route::get('/hello/{name}', function (string $name) {
    return "Hello, {$name}! This text came from a route closure.";
});

// Lesson 2: a REDIRECT route
Route::redirect('/home', '/');

// Lesson 3: ONE line = 7 routes for the resource controller
Route::resource('students', StudentController::class);

// Lesson 4: EXPLICIT route model binding — {roll} is resolved in
// AppServiceProvider::boot() with Route::bind('roll', ...)
Route::get('/roll/{roll}', function (Student $roll) {
    return view('students.show', ['student' => $roll]);
})->name('students.byRoll');

// Lesson 4: implicit binding on a custom column — {student:roll_no}
Route::get('/by-roll/{student:roll_no}', [StudentController::class, 'show'])->name('students.byRollNo');

// Lesson 6: JSON — an array/Eloquent result returned from a route becomes JSON
Route::get('/api/students', function () {
    return Student::orderBy('roll_no')->get();          // Content-Type: application/json
});

Route::get('/api/students/{student}', function (Student $student) {
    return response()->json($student);
});

// Lesson 6: page that uses fetch + JSON.parse / JSON.stringify in the browser
Route::view('/json-demo', 'json-demo')->name('json.demo');
