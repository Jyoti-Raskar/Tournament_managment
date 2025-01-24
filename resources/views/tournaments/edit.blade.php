@extends('layout')

@section('title', 'Edit Tournament')

@section('content')
    <h2>Edit Tournament</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tournaments.update', $tournament->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tournamentName" class="form-label">Tournament Name</label>
            <input type="text" id="tournamentName" name="tournamentName" class="form-control" value="{{ $tournament->tournamentName }}" required>
        </div>

        <div class="mb-3">
            <label for="teamSize" class="form-label">Team Size</label>
            <input type="number" id="teamSize" name="teamSize" class="form-control" value="{{ $tournament->teamSize }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Tournament</button>
        <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
