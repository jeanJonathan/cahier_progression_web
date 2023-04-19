@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $etape->nom }}</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Description :</strong> {{ $etape->description }}</p>
                <p><strong>Level :</strong> {{ $etape->level->nom }}</p>
            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ $etape->video_url }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <hr>
        <p><a href="{{ route('progressions.show', $etape->progression->id) }}">Retour à la progression</a></p>
    </div>
@endsection
