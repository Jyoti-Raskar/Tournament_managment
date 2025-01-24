@extends('layout')

@section('title', 'Tournament Details')

@section('content')
    <h2>{{ $tournament->tournamentName }} Details</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $tournament->id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ $tournament->tournamentName }}</td>
        </tr>
        <tr>
            <th>Team Size</th>
            <td>{{ $tournament->teamSize }}</td>
        </tr>
    </table>

    <h3>Teams</h3>
    <ul>
        @foreach ($tournament->teams as $team)
            <li>{{ $team->teamName }}</li>
        @endforeach
    </ul>

    <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">Back</a>
@endsection
