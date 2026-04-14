@php
use App\Services\Javascript\ViteService;
@endphp
<meta charset="UTF-8">

<link rel="icon" type="image/svg+xml" href="/favicon.svg">

{!! ViteService::init() !!}
<link rel="stylesheet" href="{{ ViteService::asset('resources/css/app.css') }}">
<script type="module" src="{{ ViteService::asset('resources/js/entrypoints/turbo.ts') }}"></script>
