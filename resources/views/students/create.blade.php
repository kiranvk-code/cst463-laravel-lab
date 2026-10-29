@extends('layouts.app')

@section('title', 'Add student')

@section('content')
    <h1>Add student</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf   {{-- hidden token: Laravel rejects POST forms without it (419) --}}
        @include('students._fields', ['withRoll' => true])
        <p><button class="btn">Save</button></p>
    </form>
@endsection
