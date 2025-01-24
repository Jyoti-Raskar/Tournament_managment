@extends('layout')

@section('title', 'Teams List')

@section('content')
    <h2>Teams</h2>
    <a href="{{ route('teams.create') }}" class="btn btn-primary mb-3">Add New Team</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Team Name</th>
                <th>Tournament</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->teamName }}</td>
                    <td>{{ $team->tournament->tournamentName }}</td>
                    <td>
                        <a href="{{ route('teams.show', $team->id) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
