@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center; font-weight: bold; margin-bottom: 20px; font-size: 36px; line-height: 1.2;">{{ $sportNom->name }}</h1>
        <div class="etapes-container">
            @foreach ($etapes as $key => $etape)
                <div class="">
                    <div class="etapes-item-content">
                        <div class="etapes-item-image">
                            @if ($etape->isValidated)
                                <img src="{{ asset('isValided.png') }}" alt="Image de l'étape validée {{ $key + 1 }}" class="video" width="220" height="140">
                            @else
                                <video width="220" height="140" controls style="border-radius: 8px;">
                                    <source src="{{ $etape->video_url }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la lecture de vidéos HTML5.
                                </video>
                            @endif
                        </div>
                        <div class="etapes-item-description">
                            <a href="{{ route('etapes.show', $etape->id) }}" style="text-decoration:none;">
                                {{ $key + 1 }} - {{ $etape->description}}
                            </a>
                        <div class="etape-buttons">
                            @if (!$etape->is_validated)
                                <!--pour passer l'identifiant en tant que paramètre dans l'URL de la page suivante--->
                                <a href="{{ route('progressions.create', ['etape_id' => $etape->id]) }}" class="btn btn-sm btn-success" style="text-decoration:none;">Valider étape</a>
                                &nbsp; &nbsp; &nbsp;
                            @endif
                            <a href="{{ $etape->video_url }}" target="_blank" class="btn btn-sm btn-info" style="text-decoration:none;">Voir la vidéo</a>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

<style>
    @media (max-width: 426px) {
        .etapes-container {
            grid-template-columns: repeat(2, 1fr);
            display: grid;
            gap: 20px;
        }
        video {
            width: 170px;
            height: 130px;
        }
        .etape-buttons .btn {
            font-size: 9px;
            padding: 4px 9px;
        }
        .etapes-item-description{
            font-size: 12px;
        }
    }
    @media (min-width: 768px) {
        .etapes-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
    }
    @media (min-width: 992px) {
        .etapes-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
    }
    @media (min-width: 1024px) {
        .etapes-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
    }
    @media (min-width: 1440px) {
        .etapes-container {
            grid-template-columns: repeat(5, 1fr);
        }
    }
    @media (min-width: 1600px) {
        .etapes-container {
            grid-template-columns: repeat(5, 1fr);
        }
    }
    .etapes-item-description {
        font-weight: bold;
        margin-bottom: 10px;
    }
    @media (max-width: 320px) {
        .etapes-container {
            grid-template-columns: repeat(2, 1fr);
            display: grid;
            gap: 20px;
        }
        video {
            width: 140px;
            height: 100px;
        }
        .etape-buttons .btn {
            font-size: 9px;
            padding: 2px 3px;
        }
        .etapes-item-description{
            font-size: 10px;
        }
    }
    .etapes-container{
        justify-content: center;
    }
    .etapes-item-content {
        text-align: center;
    }
</style>
