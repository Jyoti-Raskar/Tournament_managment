@extends('layout')

@section('content')
    <h3>{{ $tournament->tournamentName }} Results</h3>

    <table class="table table-bordered">
        <tr>
            <th>Round 1</th>
            <th>Round 2</th>
            <th>Winner</th>
        </tr>
        @foreach($tournament->teams as $index => $team)
        <tr>
            <td>{{ $team->teamName }}</td>
            <td>{{ $index % 2 == 0 ? $team->teamName : '' }}</td>
            <td>{{ $index == count($tournament->teams) - 1 ? $team->teamName : '' }}</td>
        </tr>
        @endforeach
    </table>

    <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">Back</a>
@endsection
