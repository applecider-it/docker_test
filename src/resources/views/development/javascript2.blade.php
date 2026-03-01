@php
use App\Services\Javascript\ViteService;

$sectionClass = 'border-2 p-2 border-red-500';
@endphp
@extends('layouts.app')
@section('content')

<script type="module" src="{{ ViteService::asset('resources/js/entrypoints/javascript-test2.ts') }}"></script>

<h2 class="app-h2">development.javascript2</h2>

<div id="app-page-development-javascript-test2"></div>

<div class="space-y-2">
    <h3 class="app-h3">react</h3>
    <div id="react" class="{{ $sectionClass }}"></div>

    <h3 class="app-h3">vue</h3>
    <div id="vue" class="{{ $sectionClass }}"></div>

    <h3 class="app-h3">htmx</h3>
    <div class="{{ $sectionClass }}">@include('development.partials.htmx')</div>

    <h3 class="app-h3">alpine</h3>
    <div class="{{ $sectionClass }}">@include('development.partials.alpine')</div>

    <h3 class="app-h3">turbo</h3>
    <div class="{{ $sectionClass }}">@include('development.partials.turbo')</div>
</div>

@endsection