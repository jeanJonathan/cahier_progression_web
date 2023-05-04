@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $level->nom }}</h1>

        <p><strong>Description :</strong> {{ $level->description }}</p>

        <p><strong>Heures nécessaires :</strong> {{ $level->hours_needed }}</p>

        <p><strong>Sport :</strong> {{ $level->sport->name }}</p>

    </div>
@endsection
