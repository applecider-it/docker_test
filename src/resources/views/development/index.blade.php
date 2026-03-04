@php
use function App\Helpers\route;
@endphp
@extends('layouts.app')
@section('content')

<h2 class="app-h2">development.index</h2>

<p><a href="{{ route('development.database') }}" class="app-link-normal">database</a></p>
<p><a href="{{ route('development.javascript') }}" class="app-link-normal">javascript</a></p>

@endsection