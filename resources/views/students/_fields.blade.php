@if ($errors->any())
    <div class="errors">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

@isset($withRoll)
    <label>Roll no</label>
    <input name="roll_no" value="{{ old('roll_no') }}" placeholder="CS23-07">
@endisset
<label>Name</label>
<input name="name" value="{{ old('name', $student->name ?? '') }}">
<label>Email</label>
<input name="email" value="{{ old('email', $student->email ?? '') }}">
<label>Semester</label>
<input name="semester" value="{{ old('semester', $student->semester ?? 7) }}">
<label>CGPA</label>
<input name="cgpa" value="{{ old('cgpa', $student->cgpa ?? '') }}">
