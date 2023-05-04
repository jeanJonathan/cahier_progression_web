@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $level->nom }}</h1>

        <p><strong>Description :</strong> {{ $level->description }}</p>

        <p><strong>Sport :</strong> {{ $level->sport->name }}</p>

        <p><strong>Video :</strong></p>
        <video width="320" height="240" controls>
            <source src="{{ $level->video_url }}" type="video/mp4">
            Votre navigateur ne supporte pas la lecture de vidéos HTML5.
        </video>

    </div>
@endsection
