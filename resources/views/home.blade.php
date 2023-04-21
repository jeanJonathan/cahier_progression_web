@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <a href="{{ route('etapes.index') }}">Voir les étapes</a>
                        <a href="{{ route('progressions.create') }}">Creer une progression</a>
                        <a href="{{ route('levels.index') }}">Voir les niveaux</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
