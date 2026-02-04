@extends('layouts.app')

@section('content')
    <div style="text-align: center; margin-top: 50px;">
        <h1>Vous avez été déconnecté avec succès.</h1>
        <p>À bientôt sur Elsword Drop Tool !</p>
        <a href="{{ route('home') }}">Revenir à l'accueil</a>
    </div>
@endsection