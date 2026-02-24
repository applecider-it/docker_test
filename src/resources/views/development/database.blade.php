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

    <h3 class="app-h3">Pdo</h3>
    <div>
        @foreach ($usersP as $user)
            <div>{{ $user['id'] }} - {{ $user['name'] }}</div>
        @endforeach
    </div>

    <h3 class="app-h3">Doctrine</h3>
    <div>
        @foreach ($usersD as $user)
            <div>{{ $user->getId() }} - {{ $user->getName() }}</div>
        @endforeach
    </div>

    <h3 class="app-h3">Laminas</h3>
    <div>
        @foreach ($usersL as $user)
            <div>{{ $user['id'] }} - {{ $user['name'] }}</div>
        @endforeach
    </div>
</div>

@endsection