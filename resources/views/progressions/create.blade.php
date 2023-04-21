@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Notez votre Progression</strong></div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'progressions.store', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal']) !!}

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::date('date', null, ['class' => 'form-control', 'required']) !!}

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            {!! Form::label('location', 'Lieu', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('location', null, ['class' => 'form-control', 'required', 'id' => 'location-input']) !!}
                                @if ($errors->has('location'))
                                    <span class="help-block">
                <strong>{{ $errors->first('location') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('weather') ? ' has-error' : '' }}">
                            {!! Form::label('weather', 'Météo', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('weather', null, ['class' => 'form-control', 'required']) !!}
                                @if ($errors->has('weather'))
                                    <span class="help-block">
                <strong>{{ $errors->first('weather') }}</strong>
            </span>
                                @endif
                            </div>
                        </div>
                        <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script src="//code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                var lieux = [            'Capbreton',            'Hossegor',            'Biarritz',            'Lacanau',            'Hendaye',            'Vieux Boucau',            'Sicile',            'Bilbao',            'Galice',            'Conil',            'Tarifa',            'Lanzarote',            'Fuerteventura',            'Las Palmas',            'Caparica',            'Lisbonne',            'Porto',            'Ericeira',            'Peniche',            'Nazare',            'Madère',            'Açores',            'Boa Vista',            'Essaouira',            'Imsouane',            'Taghazout',            'Dakhla',            'Ahangama',            'Madiha',            'Polhena',            'Weligama',            'Herekitya',            'Mirissa',            'Arugam Bay',            'Zanzibar',            'El Gouna',            'Pavones',            'Santa Teresa',            'Tamarindo',            'Nosara',            'Uvita',            'Quepos',            'Jaco',            'Montezuma',            'Toncones',            'Mentawai',            'Bali',            'Sumbawa',            'Cabarete'        ];
                                $("#location-input").autocomplete({
                                    source: lieux
                                });
                            });
                        </script>

                        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                            {!! Form::label('notes', 'Notes', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3]) !!}

                                @if ($errors->has('notes'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('notes') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('photo_url') ? ' has-error' : '' }}">
                            {!! Form::label('photo_url', 'Photo URL', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::file('photo_url', ['class' => 'form-control-file']) !!}

                                @if ($errors->has('photo_url'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('photo_url') }}</strong>
                                        </span>
                                @endif
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
                        </div>
                    </div>
                        </div>
                    </div>
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
