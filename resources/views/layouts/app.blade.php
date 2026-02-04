<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elsword Tool</title>
    <link rel="stylesheet" href="{{asset('css/home.css') }}">
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
    @yeild('content')
</main>
</body>
</html>