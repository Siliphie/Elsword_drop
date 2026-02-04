@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <h1>Accueil - Elsword Drop Tool</h1>
    <p>Bienvenue sur ton outil de suivi de drops.</p>
    
    <p>Ici, c'est le contenu spécifique à l'accueil qui s'affiche grâce au yield.</p>
@endsection