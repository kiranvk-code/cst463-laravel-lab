@extends('layouts.app')

@section('title', 'JSON demo')

@section('content')
    <h1>JSON in the browser</h1>
    <p>This page calls <code>/api/students</code>. The server sends JSON text; the browser turns it into objects.</p>
    <p><button class="btn" id="load">Load students as JSON</button></p>
    <h3>1 · Raw JSON text from the server</h3>
    <pre id="raw" style="background:#f3f4f6;padding:10px;white-space:pre-wrap;max-height:180px;overflow:auto"></pre>
    <h3>2 · After <code>JSON.parse()</code> — a JavaScript array</h3>
    <ul id="list"></ul>
    <h3>3 · <code>JSON.stringify()</code> of one object, pretty-printed</h3>
    <pre id="one" style="background:#f3f4f6;padding:10px"></pre>

    <script>
        document.getElementById('load').onclick = async () => {
            const res  = await fetch('/api/students');
            const text = await res.text();               // JSON is just text on the wire
            document.getElementById('raw').textContent = text;

            const students = JSON.parse(text);           // string -> JavaScript objects
            document.getElementById('list').innerHTML =
                students.map(s => `<li>${s.roll_no} — ${s.name} (CGPA ${s.cgpa})</li>`).join('');

            const first = { name: students[0].name, cgpa: Number(students[0].cgpa), passed: true, subjects: ['CST463', 'CST401'] };
            document.getElementById('one').textContent = JSON.stringify(first, null, 2); // object -> string
        };
    </script>
@endsection
