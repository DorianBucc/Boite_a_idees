@extends('layouts.app')
@section('content')
    <form action="{{ route('idea.update', $idea) }}" method="POST" class="p-4 border rounded bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $idea->title) }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $idea->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">status</label>
            <select name="status" id="status" class="form-select">
                <option value="soumise">Soumise</option>
                <option value="accepter">Accepter</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
@endsection