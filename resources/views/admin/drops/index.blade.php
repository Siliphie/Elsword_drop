@extends('layouts.app')

@section('content')
<h1>Moderator : every drop</h1>

<table border="1">
    <thead>
        <tr>
            <th>Player</th>
            <th>Item</th>
            <th>Runs</th>
            <th>Ratio</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allDrops as $drop)
        <tr>
            <td><strong>{{ $drop->user->name }}</strong></td>
            <td>{{ $drop->item_name }}</td>
            <td>{{ $drop->run_attempt }}</td>
            <td>{{ $drop->drop_rate_ratio }}%</td>
            <td>{{ $drop->created_at->format('d/m/Y') }}</td>
            <td>
                <form action="{{ route('drops.destroy', $drop->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this data?')">delete this data</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection