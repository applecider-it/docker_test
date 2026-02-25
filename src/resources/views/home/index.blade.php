@php
use function App\Helpers\route;
@endphp
@extends('layouts.app')
@section('content')

<h2 class="app-h2">home.index</h2>

<a href="{{ route('development.index') }}" class="app-link-normal">development</a>

@endsection