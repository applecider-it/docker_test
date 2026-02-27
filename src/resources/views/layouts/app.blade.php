@php
use App\Services\Javascript\ViteService;
use function App\Helpers\route;
@endphp
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    {!! ViteService::init() !!}
    <link rel="stylesheet" href="{{ ViteService::asset('resources/css/app.css') }}">
    <script type="module" src="{{ ViteService::asset('resources/js/entrypoints/app.ts') }}"></script>
</head>

<body>
    <a href="{{ route('home') }}">
        <h1 class="text-3xl font-bold text-gray-100 p-4 bg-slate-400">
            Vite + Tailwind v3 OK
        </h1>
    </a>

    <div class="container mx-auto p-8">
        @yield('content')
    </div>
</body>

</html>