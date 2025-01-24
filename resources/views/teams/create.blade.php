@extends('layout')

@section('title', 'Create Team')

@section('content')
    <h2>Create New Team</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('teams.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="teamName" class="form-label">Team Name</label>
            <input type="text" id="teamName" name="teamName" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tournament_id" class="form-label">Select Tournament</label>
            <select id="tournament_id" name="tournament_id" class="form-control" required>
                <option value="">Choose Tournament</option>
                @foreach ($tournaments as $tournament)
                    <option value="{{ $tournament->id }}">{{ $tournament->tournamentName }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Team</button>
        <a href="{{ route('teams.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
