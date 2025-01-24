@extends('layout')

@section('title', 'Team Details')

@section('content')
    <h2>Team Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $team->id }}</td>
        </tr>
        <tr>
            <th>Team Name</th>
            <td>{{ $team->teamName }}</td>
        </tr>
        <tr>
            <th>Tournament</th>
            <td>{{ $team->tournament->tournamentName }}</td>
        </tr>
    </table>

    <a href="{{ route('teams.index') }}" class="btn btn-secondary">Back</a>
@endsection
