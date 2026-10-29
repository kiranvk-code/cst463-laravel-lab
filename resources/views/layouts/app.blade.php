<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Students') · {{ $courseName }}</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 860px; margin: 0 auto; padding: 0 16px 40px; color: #1f2937; line-height: 1.55 }
        header { display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #dc2626; padding: 14px 0; margin-bottom: 20px }
        header a { color: #dc2626; font-weight: 700; text-decoration: none; font-size: 1.15rem }
        table { width: 100%; border-collapse: collapse } th, td { padding: 8px 10px; border-bottom: 1px solid #e5e7eb; text-align: left }
        th { background: #f9fafb } .btn { display: inline-block; padding: 6px 14px; border-radius: 6px; background: #dc2626; color: #fff; text-decoration: none; border: 0; cursor: pointer; font-size: .95rem }
        .btn.grey { background: #6b7280 } .status { background: #dcfce7; border: 1px solid #86efac; padding: 10px 14px; border-radius: 8px; margin-bottom: 16px }
        .errors { background: #fee2e2; border: 1px solid #fca5a5; padding: 10px 14px; border-radius: 8px } label { display: block; margin-top: 10px; font-weight: 600 }
        input { padding: 7px 9px; width: 100%; max-width: 360px; border: 1px solid #d1d5db; border-radius: 6px } .top { background: #fef3c7 }
        code { background: #f3f4f6; padding: 2px 6px; border-radius: 4px }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('students.index') }}">{{ $courseName }} · Students</a>
        <span>Laravel {{ app()->version() }}</span>
    </header>

    {{-- flash message set by redirect()->with('status', ...) --}}
    @if (session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif

    @yield('content')
</body>
</html>
