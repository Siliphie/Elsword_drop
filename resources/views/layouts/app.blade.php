<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Elsword Tool</title>
</head>
<body>
    <nav>
        <strong>Elsword Drop</strong>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            
            @auth
                <li><strong>Player : {{ auth()->user()->name }} (ERP: {{ auth()->user()->erp }}) </strong>
                    <a href="{{ route('profile.edit') }}">
                    <button type="button">Update profile</button></a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Deconnexion</button>
                    </form>
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}">Connexion / Inscription</a></li>
            @endguest
        </ul>
    </nav>

    <hr>

    <main>
        @yield('content')
    </main>
</body>
</html>