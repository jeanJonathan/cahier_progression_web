@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $level->nom }}</h1>

        <p><strong>Description :</strong> {{ $level->description }}</p>

        <p><strong>Heures nécessaires :</strong> {{ $level->hours_needed }}</p>

        <p><strong>Sport :</strong> {{ $level->sport->name }}</p>

        <p>
            <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-warning btn-sm">Modifier</a>
        <form action="{{ route('levels.destroy', $level->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
        </form>
        </p>
    </div>
@endsection
