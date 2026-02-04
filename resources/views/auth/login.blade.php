@extends ('layouts.app')
@section ('content')
    <div class="login-container">
        <h1>Connexion</h1>
        
        <form action="/login" method="POST">
            @csrf <div>
                <label>Email :</label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label>Mot de passe :</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Se connecter</button>
        </form>
    <p>You're not registered yet?</p>
    <a href="{{route('register')}}"> Register </a>
@endsection 
