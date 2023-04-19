@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Liste des niveaux</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Heures nécessaires</th>
                        <th>Sport</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{ $level->nom }}</td>
                            <td>{{ $level->description }}</td>
                            <td>{{ $level->hours_needed }}</td>
                            <td>{{ $level->sport->name }}</td>
                            <td>
                                <a href="{{ route('levels.show', $level->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                <a href="{{ route('levels.edit', $level->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="{{ route('levels.destroy', $level->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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


<!-----
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Niveaux de sport(nom)</div>

                    <div class="card-body">
                        <ul>
                            ---ch($levels->nom as $level)
                                <li>
                                    <a href=route('levels.show', ['levels' => $level]) }}$levels->nom }}</a>
                                </li>
                           ---each
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
----->
