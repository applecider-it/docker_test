@php
use App\Services\Javascript\ViteService;
use function App\Helpers\route;
@endphp
<!doctype html>
<html lang="ja">

<head>
    @include('layouts.partials.head')
    <script type="module" src="{{ ViteService::asset('resources/js/entrypoints/turbo.ts') }}"></script>
</head>

<body>
    <div>
        <h1 class="text-3xl font-bold text-gray-100 p-4 bg-slate-400">
            Turbo Test
        </h1>
    </div>

    <div class="container mx-auto p-8 pb-40">
        @yield('content')
    </div>
</body>

</html>