@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center; font-weight: bold; margin-bottom: 20px; font-size: 36px; line-height: 1.2;">{{ $sportNom->name }}</h1>
        <div class="etapes-container">
            @php
                $nb_validated_step = 0;
            @endphp

            @foreach ($etapes as $key => $etape)
                <div class="">
                    <div class="etapes-item-content">
                        <div class="etapes-item-image">
                            @php
                                $i = 0;
                                $isValided = false;
                            @endphp
                            @while(!$isValided && $i < count($progressions_user))
                                @if($progressions_user[$i]->etape_id == $etape->level_id)
                                    <img src="{{ asset('isValided.png') }}" alt="Image de l'étape validée {{ $key + 1 }}" class="video" width="220" height="140">
                                    @php
                                        $isValided = true;
                                        //On increment pour connaitre le nombre d'etape validee
                                        $nb_validated_step++;
                                    @endphp
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endwhile
                            @php
                            //On initialise nb_step a la valeur totale d'etape contenue dans l'objet etape passe a la vue
                                $nb_step = count($etapes);
                                // pour commencer le parcours à partir de la deuxieme étape non validée ainsi la premiere etape suivant l'etape
                                //validee aura les boutons activee.
                            $current_step = $nb_validated_step + 1;

                            @endphp

                            @if(!$isValided)
                                <video width="220" height="140" controls style="border-radius: 8px;">
                                    <source src="{{ $etape->video_url }}" type="video/mp4">
                                    Votre navigateur ne supporte pas la lecture de vidéos HTML5.
                                </video>
                                <!-- On affiche le cadenas pour verrouiller l'étape non validée -->
                                <img src="{{ asset('etapelock.jpg') }}" alt="Image du cadenas" class="lock" width="10" height="10">
                            @endif
                        </div>
                        <div class="etapes-item-description">
                            <a href="{{ route('etapes.show', $etape->id) }}" style="text-decoration:none;">
                                {{ $key + 1 }} - {{ $etape->description}}
                            </a>
                            <div class="etape-buttons">
                                @if($isValided)
                                    <!-- On grise le bouton valider étape et le bouton voir vidéo si l'étape est validée -->
                                    <a href="{{ route('progressions.create', ['etape_id' => $etape->id]) }}" class="btn btn-sm btn-success disabled" style="text-decoration:none;">Valider étape</a>
                                    &nbsp; &nbsp; &nbsp;
                                    <a href="{{ $etape->video_url }}" target="_blank" class="btn btn-sm btn-info disabled" style="text-decoration:none;">Voir la vidéo</a>
                                @else
                                    @if($loop->iteration >= $current_step)
                                        <!-- On grise le bouton valider étape et le bouton voir vidéo si l'étape n'a pas encore été atteinte -->
                                        @if($etape->id == $etapes[$current_step - 1]->id)
                                            <a href="{{ route('progressions.create', ['etape_id' => $etape->id]) }}" class="btn btn-sm btn-success" style="text-decoration:none;">Valider étape</a>
                                        @else
                                            <a href="{{ route('progressions.create', ['etape_id' => $etape->id]) }}" class="btn btn-sm btn-success disabled" style="text-decoration:none;">Valider étape</a>
                                        @endif
                                        &nbsp; &nbsp; &nbsp;
                                        @if($etape->id == $etapes[$current_step - 1]->id)
                                            <a href="{{ $etape->video_url }}" target="_blank" class="btn btn-sm btn-info" style="text-decoration:none;">Voir la vidéo</a>
                                        @else
                                            <a href="{{ $etape->video_url }}" target="_blank" class="btn btn-sm btn-info disabled" style="text-decoration:none;">Voir la vidéo</a>
                                        @endif
                                    @endif
                                @endif

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
