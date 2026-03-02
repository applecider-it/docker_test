@extends('layouts.app')
@section('content')

<h2 class="app-h2">development.database</h2>

<div>
    <h3 class="app-h3">Eloquent</h3>
    <div>
        @foreach ($users as $user)
            <div>{{ $user->id }} - {{ $user->name }}</div>
        @endforeach
    </div>
</div>

@endsection