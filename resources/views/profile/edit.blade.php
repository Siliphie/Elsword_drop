@extends('layouts.app')

@section('content')
    
    @if(session('success'))
        <div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 20px;">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
            <ul>
                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
            </ul>
        </div>
    @endif

    <h1>Update my profile</h1>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div>
            <label>New nickname :</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}">
        </div>

        <div>
            <label>New ERP :</label>
            <input type="number" name="erp" value="{{ auth()->user()->erp }}" min="0" max="1500">
        </div>

        <hr>
        <p><strong>Security :</strong> (Leave empty to keep current password)</p>

        <div>
             <label>Current Password :</label>
             <input type="password" name="current_password">
             <small>(Required if you want to change your password)</small>
        </div>

        <div>
            <label>New Password :</label>
            <input type="password" name="password">
        </div>

        <div>
            <label>Confirm Password :</label>
            <input type="password" name="password_confirmation">
        </div>

        <button type="submit" style="margin-top: 10px;">Update profile</button>
    </form>

    <hr>

    <section>
        <header>
            <h2>Supprimer le compte</h2>
            <p>Une fois votre compte supprimé, toutes vos statistiques de drop seront définitivement effacées.</p>
        </header>

        <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure to delete everything ? all your personnal data will be lost');">
            @csrf
            @method('delete')

            <div>
                <label for="delete_password">Confirmez votre mot de passe pour supprimer :</label>
                <input id="delete_password" name="password" type="password" required>
            </div>

            <button type="submit" style="color: red; margin-top: 10px;">SUPPRIMER MON COMPTE</button>
        </form>
    </section>
@endsection