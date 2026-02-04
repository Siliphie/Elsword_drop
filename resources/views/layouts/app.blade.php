<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elsword Tool</title>
    @stack('styles')
</head>
<body>
    <nav>
        <strong>Elsword Drop</strong>
        <ul>
            <li><a href="{{route('home')}}"> Accueil</a></li>
            <li><a href="/dashboard" > My Drop List </a></li>
        </ul>

        <form method= "POST" action = "/logout">
            @csrf
            <button type="submit">Deconnexion</button>
</form>
</nav>

<main>
    @yield('content')
</main>
</body>
</html>