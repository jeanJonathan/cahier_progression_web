@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'étape</h1>
        <hr>
        <form method="POST" action="{{ route('etapes.update', $etape->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $etape->nom }}">
            </div>
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $etape->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="video_url">URL de la vidéo :</label>
                <input type="text" class="form-control" id="video_url" name="video_url" value="{{ $etape->video_url }}">
            </div>
            <div class="form-group">
                <label for="level_id">Niveau :</label>
                <select class="form-control" id="level_id" name="level_id">
                    @foreach($levels as $level)
                        <option value="{{ $level->id }}" {{ $level->id == $etape->level_id ? 'selected' : '' }}>{{ $level->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('etapes.show', $etape->id) }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
