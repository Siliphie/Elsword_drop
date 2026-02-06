@extends('layouts.app')

@section('content')
    <h1>My Drop List</h1>

    <a href="{{ route('drops.create') }}">
        <button type="button">+ Add new item</button>
    </a>

    <hr>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Item</th>
                <th>Runs</th>
                <th>Drop Rate (%)</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse(auth()->user()->itemDropRates as $drop)
                <tr>
                    <td>{{ $drop->id}}</td>
                    <td>{{ $drop->item_name }}</td>
                    <td>{{ $drop->run_attempt }}</td>
                    <td>{{ $drop->drop_rate_ratio }}%</td>
                    <td>{{ $drop->created_at->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('drops.destroy', $drop->id) }}" method="POST" onsubmit="return confirm('Supprimer cet item ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red;">delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Aucun item dans la liste.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <a href="/">Return to home page</a>
@endsection