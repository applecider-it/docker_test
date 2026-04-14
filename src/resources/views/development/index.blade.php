@php
use function App\Helpers\route;
@endphp
@extends('layouts.app')
@section('content')

<h2 class="app-h2">development.index</h2>

<div>
    <p><a href="{{ route('development.database') }}" class="app-link-normal">database</a></p>
    <p><a href="{{ route('development.javascript') }}" class="app-link-normal">javascript</a></p>
    <p><a href="{{ route('development.atomic') }}" class="app-link-normal">atomic</a></p>
</div>

<div class="mt-5">
    <p><a href="{{ route('development.turbo') }}" class="app-link-normal" target="_blank">turbo</a></p>
</div>

@endsection