@php
use App\Services\Javascript\ViteService;
use function App\Helpers\route;
@endphp
<!doctype html>
<html lang="ja">

<head>
    @include('layouts.partials.head_turbo')
</head>

<body>
    <div>
        <h1 class="text-3xl font-bold text-gray-100 p-4 bg-slate-400">
            Turbo Test
        </h1>

        <div class="p-5 space-x-3">
            <a href="{{ route('development.turbo') }}" class="app-link-normal">turbo</a>

            <a href="{{ route('development.turbo2') }}" class="app-link-normal">turbo2</a>
        </div>
    </div>

    <div class="container mx-auto p-8 pb-40">
        @yield('content')
    </div>
</body>

</html>