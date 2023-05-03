@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $sportNom->name }}</h1>

        <ul>
            @foreach ($etapes as $key => $etape)
                <li>{{ $key + 1 }} - {{ $etape->description}} </li>
            @endforeach
        </ul>
    </div>
@endsection
