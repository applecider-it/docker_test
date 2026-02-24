@php
use App\Services\Javascript\ViteService;

$sectionClass = 'border-2 p-2';
@endphp
@extends('layouts.app')
@section('content')

<script type="module" src="{{ ViteService::asset('resources/js/entrypoints/javascript-test.ts') }}"></script>

<h2 class="app-h2">development.javascript</h2>

<div class="space-y-2">
    <div id="react" class="{{ $sectionClass }}"></div>
    <div id="vue" class="{{ $sectionClass }}"></div>
    <div class="{{ $sectionClass }}">
        @include('development.partials.htmx')
    </div>
</div>

@endsection