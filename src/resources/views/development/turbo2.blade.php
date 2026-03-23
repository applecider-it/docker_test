@php
use App\Services\Javascript\ViteService;
use function App\Helpers\route;
@endphp
@extends('layouts.turbo')
@section('content')

<script type="module" src="{{ ViteService::asset('resources/js/entrypoints/turbo-test2.ts') }}"></script>

<h2 class="app-h2">development.turbo</h2>

<div id="app-page-development-turbo-test2"></div>

<p><a href="{{ route('development.turbo') }}" class="app-link-normal">turbo</a></p>

@endsection