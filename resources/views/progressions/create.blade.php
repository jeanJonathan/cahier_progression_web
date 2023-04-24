@extends('layouts.app')
@section('content')
        <div class="container my-5">
            <h1 class="text-center my-5">Formulaire de progression</h1>
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
                <div class="form-group{{ $errors->has('video_file') ? ' has-error' : '' }}">
                    <label for="video_file" class="control-label">Télécharger une vidéo (taille maximale: 50 Mo)</label>
                    <input id="video_file" type="file" class="form-control" name="video_file">
                    @if ($errors->has('video_file'))
                        <span class="help-block">
                <strong>{{ $errors->first('video_file') }}</strong>
            </span>
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
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('photo_url') ? ' has-error' : '' }}">
                    {!! Form::label('photo_url', 'Photos', ['class' => 'form-label']) !!}
                    <div class="row mx-auto"> <!-- ajouter la classe mx-auto -->
                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-md-2 col-sm-4 col-6">
                                <div class="preview-images-zone">
                                    <div class="image-wrapper">
                                        <img src="" class="preview-image" style="max-height: 100%; max-width: 100%; display: none;">
                                        <p class="preview-text" style="font-size: 8px;"></p>
                                    </div>
                                    <input type="file" class="file-input" name="photo_url[]" accept="image/*" style="display:none;">
                                    <button type="button" class="btn btn-primary file-button"><img src="" class="add-icon" style="max-height: 100%; max-width: 100%;">+</button>
                                    <p class="filename"></p>
                                </div>
                            </div>
                        @endfor
                    </div>
                    @if ($errors->has('photo_url'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photo_url') }}
                        </div>
                    @endif
                </div>
                <script>
                    $(function() {
                        $('.file-button').on('click', function() {
                            $(this).siblings('.file-input').click();
                        });
                        $('.file-input').on('change', function() {
                            var file = $(this)[0].files[0];
                            if (file.type.match('image.*')) {
                                var reader = new FileReader();
                                var zone = $(this).parent('.preview-images-zone');
                                reader.onload = function(e) {
                                    zone.children('.image-wrapper').children('.preview-text').text(file.name.substring(0, 3)).show();
                                    zone.children('.image-wrapper').children('.preview-image').attr('src', e.target.result).show();
                                    zone.children('.file-button').children('.add-icon').hide();
                                }
                                reader.readAsDataURL(file);
                            }
                            //zone.children('.filename').text(file.name);
                        });
                        $(window).on('resize', function() {
                            var screenWidth = $(window).width();
                            var numCols = 6;
                            if (screenWidth < 576) {
                                numCols = 2;
                            } else if (screenWidth < 768) {
                                numCols = 3;
                            } else if (screenWidth < 992) {
                                numCols = 4;
                            } else if (screenWidth < 1200) {
                                numCols = 5;
                            }
                            var colWidth = 12 / numCols;
                            $('.preview-images-zone').removeClass(function(index, className) {
                                return (className.match(/(^|\s)col-\S+/g) || []).join(' ');
                            }).addClass('col-' + colWidth);
                        }).trigger('resize');
                    });
                </script>
            </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Valider votre progression
                    </button>
                </div>
            </div>
    </form>
@endsection
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

