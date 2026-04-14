@php
use function App\Helpers\route;
use App\Services\Javascript\ViteService;
@endphp
@extends('layouts.turbo')
@section('content')

<script type="module" src="{{ ViteService::asset('resources/js/entrypoints/development/turbo-test2.ts') }}"></script>

<h2 class="app-h2">development.turbo2</h2>

<div class="space-y-5">
    <div id="app-page-container-development-turbo2"></div>
</div>

@endsection