@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Tableau de bord</h1>
        
        <label>
            <form action="" class="d-flex justify-content-between align-items-center mb-3">
                <input name="search" id="search" class="form-control" placeholder="Search" value="{{ $search }}" type="text">
                <select name="champs" id="champs" class="form-control">
                    <option value=""></option>
                    <option value="titre" {{ $champs == "titre" ? 'selected' : '' }}>Titre</option>
                    <option value="description" {{ $champs == "description" ? 'selected' : '' }}>Description</option>
                </select>
            </form>
        </label>
        <a href="{{ route('idea.create') }}" class="btn btn-primary">Créer une
            idée</a>
    </div>
    <hr>
    <h2 class="mb-3">Mes idées</h2>
    @forelse ($ideas as $idea)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">
                            <a href="{{ route('idea.show', $idea) }}">{{ $idea->title }}</a>
                        </h5>
                        <span class="badge text-bg-secondary">{{ $idea->status }}</span>
                        <p class="card-text">{{ $idea->description }}</p>
                    </div>
                    <div class="d-flex gap-2 align-items-start">
                        <a href="{{ route('idea.edit', $idea) }}" class="btn btn-secondary btn-sm">Modifier</a>
                        <form action="{{ route('idea.destroy', $idea) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btnsm">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-secondary">Vous n'avez encore créé aucune idea.</div>
    @endforelse
@endsection
