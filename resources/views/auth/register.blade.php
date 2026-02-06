@extends('layouts.app')

@section('content')
    <div class="login-container">
        <h1>Inscription</h1> <form action="{{ route('register.submit') }}" method="POST">
            @csrf 
            <div>
                <label>Nickname :</label>
                <input type="text" name="name" required>
            </div>
            
            <div>
                <label>Email :</label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label>Password :</label>
                <input type="password" name="password" required>
            </div>

            <div>
                <label>Password confirmation :</label>
                <input type="password" name="password_confirmation" required>
            </div>

            <div>
                <label>ERP (optionnal) :</label>
                <input type="number" name="erp" min="0" max="1500" value="0">
            </div>

            <button type="submit">Créer mon compte</button>
        </form>
        
        <p>Already have an account?</p>
        <a href="{{ route('login') }}"> Login </a>
    </div>
@endsection