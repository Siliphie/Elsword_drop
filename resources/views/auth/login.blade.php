@extends('layouts.app')

@section('content')
    <div class="login-container">
        {{-- On affiche le message de succès tout en haut si il existe --}}
        @if(session('success'))
            <div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->has('email'))
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px;">
        {{ $errors->first('email') }}
    </div>
        @endif

        <h1>Connexion</h1>
        
        <form action="/login" method="POST">
            @csrf 
            <div>
                <label>Email :</label>
                <input type="email" name="email" value="{{old('email') }}" required>
            </div>

            <div>
                <label>Mot de passe :</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Se connecter</button>
        </form>

        <p>You're not registered yet?</p>
        <a href="{{ route('register') }}"> Register </a>
    </div> {{-- Fermeture de la div login-container --}}
@endsection