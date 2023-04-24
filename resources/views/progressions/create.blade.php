@extends('layouts.app')
@section('content')
        <div class="container my-5">
            <h1 class="text-center my-5">Notez votre progression</h1>
            {!! Form::open(['route' => 'progressions.store', 'method' => 'POST', 'files' => true, 'class' => 'row g-3']) !!}
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    {!! Form::label('date', 'Date', ['class' => 'form-label']) !!}
                    {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                    {!! Form::label('location', 'Lieu', ['class' => 'form-label']) !!}
                    {!! Form::text('location', null, ['class' => 'form-control', 'required', 'id' => 'location-input']) !!}
                    @if ($errors->has('location'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('weather') ? ' has-error' : '' }}">
                    {!! Form::label('weather', 'Météo', ['class' => 'form-label']) !!}
                    {!! Form::text('weather', null, ['class' => 'form-control', 'required', 'id' => 'weather-input']) !!}
                    @if ($errors->has('weather'))
                        <div class="invalid-feedback">
                            {{ $errors->first('weather') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('photo_url') ? ' has-error' : '' }}">
                    {!! Form::label('photo_url', 'Photo URL', ['class' => 'form-label']) !!}
                    <!---texte pour indiquer la saisie d'un url pour la photo, on a aussi file..-->
                    {!! Form::text('photo_url', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('photo_url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photo_url') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                    {!! Form::label('notes', 'Notes', ['class' => 'form-label']) !!}
                    {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3]) !!}
                    @if ($errors->has('notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                    @endif
                </div>
            </div>
            <!--champ pour la video dans un autre bloc juste en bas s'adaptant a la largeur de l'ecran-->
                <div class="form-group{{ $errors->has('video_url') ? ' has-error' : '' }}">
                    <label for="video_url" class="control-label">Vidéo URL</label>
                    <input id="video_url" type="text" class="form-control" name="video_url" value="{{ old('video_url') }}" autofocus>
                    @if ($errors->has('video_url'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('video_url') }}</strong>
                                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Valider votre progression
                    </button>
                </div>
            </div>
    </form>
@endsection
<style>
    .ui-autocomplete {
        color: blue;
        /*pour placer la liste au-dessus de tous les autres éléments de la page avec*/
        z-index: 9999;
    }

    .ui-menu-item {
        background-color: white;
        color: black;
    }
    .ui-autocomplete {
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        padding: 0.5em;
        list-style-type: none;
    }
    .ui-autocomplete li {
        list-style-type: none;
    }
    .ui-autocomplete {
        width: 300px; /* On ajuste la valeur de la largeur en fonction du champ du formulaire */
    }
</style>
<!--implementation de la fonctionnalite d'auto completion-->
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        var lieux = [            'Capbreton',            'Hossegor',            'Biarritz',            'Lacanau',            'Hendaye',            'Vieux Boucau',            'Sicile',            'Bilbao',            'Galice',            'Conil',            'Tarifa',            'Lanzarote',            'Fuerteventura',            'Las Palmas',            'Caparica',            'Lisbonne',            'Porto',            'Ericeira',            'Peniche',            'Nazare',            'Madère',            'Açores',            'Boa Vista',            'Essaouira',            'Imsouane',            'Taghazout',            'Dakhla',            'Ahangama',            'Madiha',            'Polhena',            'Weligama',            'Herekitya',            'Mirissa',            'Arugam Bay',            'Zanzibar',            'El Gouna',            'Pavones',            'Santa Teresa',            'Tamarindo',            'Nosara',            'Uvita',            'Quepos',            'Jaco',            'Montezuma',            'Toncones',            'Mentawai',            'Bali',            'Sumbawa',            'Cabarete'        ];
        $("#location-input").autocomplete({
            source: lieux
        });
        var meteos = [
            'ensoleillé',
            'nuageux',
            'pluvieux',
            'orageux',
            'neigeux',
            'brumeux',
            'venteux',
            'tempete',
            'caniculaire',
            'froid'
        ];

        $("#weather").autocomplete({
            source: meteos
        });

    });
</script>
