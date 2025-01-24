@extends('layout')

@section('title', 'Create Tournament')

@section('content')
    <h2>Create New Tournament</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tournaments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tournamentName" class="form-label">Tournament Name</label>
            <input type="text" id="tournamentName" name="tournamentName" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="teamSize" class="form-label">Team Size</label>
            <input type="number" id="teamSize" name="teamSize" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create Tournament</button>
        <a href="{{ route('tournaments.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
