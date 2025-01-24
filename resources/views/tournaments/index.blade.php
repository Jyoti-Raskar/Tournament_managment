@extends('layout')

@section('content')
    <a href="{{ route('tournaments.create') }}" class="btn btn-primary">Create Tournament</a>
    
    <table class="table table-bordered mt-4">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Size</th>
            <th>Actions</th>
        </tr>
        @foreach($tournaments as $tournament)
            <tr>
                <td>{{ $tournament->id }}</td>
                <td>{{ $tournament->tournamentName }}</td>
                <td>{{ $tournament->teamSize }}</td>
                <td>
                    <a href="{{ route('tournaments.show', $tournament) }}" class="btn btn-info">View</a>
                    <a href="{{ route('tournaments.edit', $tournament->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ url('/tournament/'.$tournament->id.'/results') }}" class="btn btn-secondary">Results</a>
                    <form action="{{ route('tournaments.destroy', $tournament) }}" method="POST">@csrf @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection





