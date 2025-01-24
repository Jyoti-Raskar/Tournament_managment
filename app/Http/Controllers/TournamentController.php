<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournaments.index', compact('tournaments'));
    }

    public function create()
    {
        return view('tournaments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tournamentName' => 'required|string|max:255',
            'teamSize' => 'required|in:4,8'
        ]);

        Tournament::create($request->all());
        return redirect()->route('tournaments.index');
    }
    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.edit', compact('tournament'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'tournamentName' => 'required|string|max:255',
            'teamSize' => 'required|integer|in:4,8|min:1',
        ]);

        // Find the tournament by ID
        $tournament = Tournament::findOrFail($id);

        // Update the tournament data
        $tournament->update([
            'tournamentName' => $request->tournamentName,
            'teamSize' => $request->teamSize,
        ]);

        // Redirect to the tournaments list with a success message
        return redirect()->route('tournaments.index')->with('success', 'Tournament updated successfully.');
    }

    public function show(Tournament $tournament)
    {
        return view('tournaments.show', compact('tournament'));
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return redirect()->route('tournaments.index');
    }

    public function results($id)
    {
        $tournament = Tournament::with('teams')->findOrFail($id);
        return view('tournaments.results', compact('tournament'));
    }
}