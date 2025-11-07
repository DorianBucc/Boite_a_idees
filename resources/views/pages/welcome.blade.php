@extends('layouts.app')
@section('content')
    <div class="container my-5">
        {{-- Le conteneur principal qui a les bordures et l'ombre --}}
        <div class="row align-items-center rounded-3 border shadow-lg overflowhidden">
            <div class="col-lg-7 p-5">
                <div class="text-center text-lg-center">
                    <h1 class="display-4 fw-bold lh-1 mb-3">Boite à idées</h1>
                    <p class="lead">Notez. Classez. Avancez. (NCA)</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 me-md-2">Connexion</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px4">S'inscrire</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0">
                <img src="{{ asset('images/img.png') }}" class="img-fluid" alt="Aperçu du tableau de bord"
                    style="height: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
@endsection
