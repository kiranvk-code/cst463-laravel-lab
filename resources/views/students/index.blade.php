@extends('layouts.app')

@section('title', 'All students')

@section('content')
    <h1>All students ({{ $students->count() }})</h1>
    <p><a class="btn" href="{{ route('students.create') }}">+ Add student</a></p>

    @if ($students->isEmpty())
        <p>No students yet.</p>
    @else
        <table>
            <tr><th>#</th><th>Roll no</th><th>Name</th><th>Sem</th><th>CGPA</th></tr>
            @foreach ($students as $student)
                <tr @class(['top' => $student->cgpa >= 9])>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->roll_no }}</td>
                    <td><a href="{{ route('students.show', $student) }}">{{ $student->name }}</a></td>
                    <td>{{ $student->semester }}</td>
                    <td>
                        {{ $student->cgpa ?? '—' }}
                        @if ($student->cgpa >= 9) ⭐ @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
