@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des étapes  - {{ $sportNom->name }}</h1>

        <ul>
            @foreach ($etapes as $etape)
                <li>{{ $etape->title }} - {{ $etape->description }}</li>
            @endforeach
        </ul>
    </div>
@endsection
