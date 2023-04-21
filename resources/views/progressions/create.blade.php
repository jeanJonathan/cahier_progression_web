@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Notez votre Progression</div>
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
                            {!! Form::label('location', 'Location', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('location', null, ['class' => 'form-control', 'required']) !!}

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('weather') ? ' has-error' : '' }}">
                            {!! Form::label('weather', 'Weather', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('weather', null, ['class' => 'form-control', 'required']) !!}

                                @if ($errors->has('weather'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('weather') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

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
                                <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                    <label for="notes" class="control-label">Notes</label>
                                    <textarea id="notes" class="form-control" name="notes">{{ old('notes') }}</textarea>
                                    @if ($errors->has('notes'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('notes') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Créer une progression
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


