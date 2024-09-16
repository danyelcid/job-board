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
                    <a href="{{ route('my_opening_applications.index') }}">
                        {{ auth()->user()->name ?? 'Anonymous' }} Applications
                    </a>
                </li>
                <li>
                    <a href="{{ route('my_openings.index') }}">
                        My Openings
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
        <x-alert-msg :type="'success'" :title="'Success!'" :message="session('success')"/>
    @endif
    @if(session('error'))
        <x-alert-msg :type="'error'" :title="'Error!'" :message="session('error')"/>
    @endif
    {{$slot}}

    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons@latest/dist/ionicons/ionicons.js"></script>
</body>
</html>
