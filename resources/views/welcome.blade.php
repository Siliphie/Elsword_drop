@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <h1>Welcome - Elsword Drop Tool</h1>
    <p>Welcome to your dropping tool elsword.</p>
    @auth
    <hr>
    <h3>Gestion des Drops</h3>
    <ul>
        <li><a href="{{ route('drops.index') }}">Ma Liste d'objets</a></li>
        <li><a href="{{ route('drops.create') }}">Ajouter un nouvel item</a></li>
    </ul>
@endauth
@endsection