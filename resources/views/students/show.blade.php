@extends('layouts.app')

@section('title', $student->name)

@section('content')
    <h1>{{ $student->name }}</h1>
    <table>
        <tr><th>Id</th><td>{{ $student->id }}</td></tr>
        <tr><th>Roll no</th><td>{{ $student->roll_no }}</td></tr>
        <tr><th>Email</th><td>{{ $student->email }}</td></tr>
        <tr><th>Department</th><td>{{ $student->department }}</td></tr>
        <tr><th>Semester</th><td>{{ $student->semester }}</td></tr>
        <tr><th>CGPA</th><td>{{ $student->cgpa ?? 'not entered' }}</td></tr>
    </table>
    <p>
        <a class="btn" href="{{ route('students.edit', $student) }}">Edit</a>
        <a class="btn grey" href="{{ route('students.index') }}">Back to list</a>
    </p>
    <form method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Delete?')">
        @csrf
        @method('DELETE')
        <button class="btn grey">Delete</button>
    </form>
@endsection
