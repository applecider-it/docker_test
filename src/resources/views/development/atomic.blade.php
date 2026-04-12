@php
use App\Services\Javascript\ViteService;
@endphp
@extends('layouts.app')
@section('content')

<script type="module" src="{{ ViteService::asset('resources/js/entrypoints/development/atomic-test.ts') }}"></script>

<h2 class="app-h2">development.atomic</h2>

<div>
    <div id="vue"></div>
</div>

@endsection