@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $sportNom->name }}</h1>
        <div class="etapes-container">
            @foreach ($etapes as $key => $etape)
                <div class="">
                    <div class="etapes-item-content">
                        <div class="etapes-item-image">
                            @if ($etape->isValidated)
                                <img src="{{ asset('isValided.png') }}" alt="Image de l'étape validée {{ $key + 1 }}" class="video" width="220" height="140">
                            @else
                                <video width="220" height="140" controls>
                                    <source src="{{ $etape->video_url }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la lecture de vidéos HTML5.
                                </video>
                            @endif
                        </div>
                        <div class="etapes-item-description">{{ $key + 1 }} - {{ $etape->description}}</div>
                        <div class="etape-buttons">
                            @if (!$etape->is_validated)
                                <a href="{{ route('progressions.create', ['etape_id' => $etape->id]) }}" class="btn btn-sm btn-success" style="text-decoration:none;">Valider étape</a>
                                &nbsp; &nbsp; &nbsp;
                            @endif
                            <a href="{{ $etape->video_url }}" target="_blank" class="btn btn-sm btn-info" style="text-decoration:none;">Voir la vidéo</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .etapes-container {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
    }

    .etapes-item {
        display: flex;
        flex-direction: column;
        border: 1px solid black;
        padding: 10px;
        max-width: 300px;
    }

    .etapes-item-image {
        margin-bottom: 10px;
    }

    .etapes-item-description {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .etapes-item-buttons {
        display: flex;
        justify-content: space-between;
    }
</style>

