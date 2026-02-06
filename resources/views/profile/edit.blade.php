@extends('layouts.app')

@section('content')
    
    @if(session('success'))
        <div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('info'))
        <div style="color: blue; border: 1px solid blue; padding: 10px; margin-bottom: 20px;">
            {{ session('info') }}
        </div>
    @endif

    @if ($errors->any())
    <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
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

        <button type="submit">Update profile</button>
    </form>
@endsection