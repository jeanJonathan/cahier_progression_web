@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Progression des étapes</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Video</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($etapes as $etape)
                        <tr>
                            <th>{{ $etape->id }}</th>
                            <td>{{ $etape->nom }}</td>
                            <td>{{ $etape->description }}</td>
                            <td>{{ $etape->video_url }}</td>
                            <td>
                                <a href="{{ route('etapes.show', $etape->id) }}" class="btn btn-primary">Voir</a>
                                <a href="{{ route('etapes.edit', $etape->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('etapes.destroy', $etape->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
