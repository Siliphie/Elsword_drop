<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elsword Tool</title>
</head>
<body>
    <nav>
        <strong>Elsword Drop</strong>
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            
            @auth
                <li><a href="/dashboard">My Drop List</a></li>
                <li><strong>Joueur : {{ auth()->user()->name }} (ERP: {{ auth()->user()->erp }}) </strong><button type="submit">update ERP</button></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit">Déconnexion</button>
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