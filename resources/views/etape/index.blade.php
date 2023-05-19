@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center; font-weight: bold; margin-bottom: 20px; font-size: 36px; line-height: 1.2; color: #10B307; text-transform: uppercase; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            {{ $sportNom->name }}
        </h1>
        <div class="etapes-container">
            @php
                $nb_validated_step = 0;
            @endphp
            @foreach ($etapes as $key => $etape)
                <div class="etapes-item">
                    <div class="etapes-item-content">
                        <div class="etapes-item-image">
                            @php
                                $i = 0;
                                $isValided = false;
                            @endphp
                            @while(!$isValided && $i < count($progressions_user))
                                @if($progressions_user[$i]->etape_id == $etape->level_id)
                                    <img src="{{ asset('isValided.png') }}" alt="Image de l'étape validée {{ $key + 1 }}" class="video" >
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
                                <!---<img src="{{ asset('etapelocks.jpg') }}" alt="Image du cadenas" class="lock" width="30" height="20">----->
                            @endif
                        </div>
                        <div class="etapes-item-description">
                            <!---protection de la route pour voir la description des etapes --->
                            <a href="{{ Auth::check() ? route('etapes.show', $etape->id) : route('login') }}" style="font-family: Arial, sans-serif; font-weight: bold; color: #10B307; text-decoration: none; opacity: 2.5;">
                                {{ $key + 1 }} - {{ $etape->description }}
                            </a>
                            <div class="etape-buttons">
                                @if($isValided)
                                    <!-- On grise le bouton valider étape et le bouton voir vidéo si l'étape est validée -->
                                    <a href="{{ route('progressions.create', ['etape_id' => $etape->id]) }}" class="btn btn-sm btn-success disabled" style="text-decoration:none;">Valider étape</a>
                                    &nbsp; &nbsp; &nbsp;
                                    <a href="{{ $etape->video_url }}" target="_blank" class="btn btn-sm btn-info disabled" style="text-decoration:none; background-color: #00BFFF;">Voir la vidéo</a>
                                @else
                                    @if($loop->iteration >= $current_step)
                                        <!-- On grise le bouton valider étape et le bouton voir vidéo si l'étape n'a pas encore été atteinte -->
                                        @php
                                            $validerEtapeClass = 'btn-success disabled';
                                            $voirVideoClass = 'btn-info disabled';
                                            if ($etape->id == $etapes[$current_step - 1]->id) {
                                                $validerEtapeClass = 'btn-success';
                                                $voirVideoClass = 'btn-info';
                                            }
                                        @endphp
                                        <a href="{{ route('progressions.create', ['etape_id' => $etape->id]) }}" class="btn btn-sm {{ $validerEtapeClass }}" style="text-decoration:none;">Valider étape</a>
                                        &nbsp; &nbsp; &nbsp;
                                        <a href="{{ $etape->video_url }}" class="btn btn-sm {{ $voirVideoClass }}" style="text-decoration:none; background-color: #00BFFF ;">Voir la vidéo</a>
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
            grid-template-columns: repeat(1, 1fr);
            display: grid;
            gap: 30px;
        }
        .video {
            width: 100px;
            height: 60px;
        }
        .video[src$="isValided.png"] {
            width: 110px;
            height: 70px;
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
        .video[src$="isValided.png"] {
            width: 140px;
            height: 90px;
        }
    }
    @media (min-width: 992px) {
        .etapes-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .video[src$="isValided.png"] {
            width: 170px;
            height: 110px;
        }
    }
    @media (min-width: 1024px) {
        .etapes-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        .video[src$="isValided.png"] {
            width: 220px;
            height: 140px;
        }
    }
    @media (min-width: 1440px) {
        .etapes-container {
            grid-template-columns: repeat(5, 1fr);
        }
        .video[src$="isValided.png"] {
            width: 220px;
            height: 140px;
        }
    }
    @media (min-width: 1600px) {
        .etapes-container {
            grid-template-columns: repeat(5, 1fr);
        }
        .video[src$="isValided.png"] {
            width: 220px;
            height: 140px;
        }
    }
    .etapes-item-description {
        font-weight: bold;
        margin-bottom: 10px;
    }
    @media (max-width: 320px) {
        .etapes-container {
            grid-template-columns: repeat(1, 1fr);
            display: grid;
            gap: 20px;
        }
        .video {
            width: 140px;
            height: 100px;
        }
        .video[src$="isValided.png"] {
            width: 90px;
            height: 60px;
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
    .etapes-item {
        background-image: url('{{ asset('cahiersss.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
        /* Autres styles souhaités */
    }

</style>

