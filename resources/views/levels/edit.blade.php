@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier un niveau</h1>

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('levels.update', $level->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ $level->nom }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="description" id="description" class="form-control">{{ $level->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="hours_needed">Heures nécessaires :</label>
                        <input type="number" name="hours_needed" id="hours_needed" class="form-control" value="{{ $level->hours_needed }}" required>
                    </div>

                    <div class="form-group">
                        <label for="sport_id">Sport :</label>
                        <select name="sport_id" id="sport_id" class="form-control" required>
                            @foreach ($sports as $sport)
                                <option value="{{ $sport->id }}" {{ $level->sport_id == $sport->id ? 'selected' : '' }}>{{ $sport->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
@endsection
