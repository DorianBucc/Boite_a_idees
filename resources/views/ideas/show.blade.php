@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="mb-3">{{ $idea->title }}</h1>
        <p><strong>Description :</strong></p>
        <p>{{ $idea->description }}</p>

        <a href="{{ route('idea.edit', $idea) }}" class="btn btn-secondary mt-3">Modifier</a>
        <form action="{{ route('idea.destroy', $idea) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
        </form>
    </div>
@endsection