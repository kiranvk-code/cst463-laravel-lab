@extends('layouts.app')

@section('title', 'Edit '.$student->name)

@section('content')
    <h1>Edit {{ $student->roll_no }}</h1>
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf
        @method('PUT')   {{-- HTML forms only do GET/POST; this hidden field makes it a PUT --}}
        @include('students._fields')
        <p><button class="btn">Save changes</button></p>
    </form>
@endsection
