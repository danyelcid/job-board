<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 11 Job Openings board</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="mx-auto pt-10 max-w-2xl bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% text-slate-700 scroll-smooth">
    <div class="p-4 bg-white border-2 shadow-sm inline-block fixed right-2 bottom-2">
        <div class="border-transparent border-2 border-t-slate-900 border-l-slate-900 w-4 h-4 rotate-45 relative top-1.5 hover:cursor-pointer"
            onclick="document.documentElement.scrollTop = 0"></div>
    </div>
    <nav class="flex justify-between mb-16 text-lg font-medium">
        <ul class="flex space-x-2">
            <li>
                <a href="{{ route('openings.index') }}">Home</a>
            </li>

        </ul>
        <ul class="flex space-x-2">
            @auth()
                <li>
                    <a href="{{ route('my-opening-applications.index') }}">
                        {{ auth()->user()->name ?? 'Anonymous' }} Applications
                    </a>
                </li>
                <li>
                    <form action="{{ route('auth.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Sing out</button>
                    </form>
                </li>
            @else
                <a href="{{ route('auth.create') }}">Sing in</a>
            @endauth
        </ul>

    </nav>

    @if(session('success'))
        <div class="my-8 rounded-md border-l-8 border-green-300 bg-green-100 text-green-700 p-4 shadow-sm" role="alert">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{$slot}}

</body>
</html>
