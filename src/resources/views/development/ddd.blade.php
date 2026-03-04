@php
use function App\Helpers\route;
@endphp
@extends('layouts.app')
@section('content')

<h2 class="app-h2">development.complate</h2>

<pre>{{ print_r($result, true) }}</pre>

@endsection