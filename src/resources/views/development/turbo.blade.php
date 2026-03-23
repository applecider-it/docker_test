@php
use App\Services\Javascript\ViteService;
use function App\Helpers\route;
@endphp
@extends('layouts.turbo')
@section('content')

<script type="module" src="{{ ViteService::asset('resources/js/entrypoints/turbo-test.ts') }}"></script>

<h2 class="app-h2">development.turbo</h2>

<div id="app-page-development-turbo-test"></div>

<p><a href="{{ route('development.turbo2') }}" class="app-link-normal">turbo2</a></p>

@endsection