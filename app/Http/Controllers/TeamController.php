<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // Show all teams
    public function index()
    {
        $teams = Team::with('tournament')->get();
        return view('teams.index', compact('teams'));
    }

    // Show create team form
    public function create()
    {
        $tournaments = Tournament::all();
        return view('teams.create', compact('tournaments'));
    }

    // Store a new team
    public function store(Request $request)
    {
        $request->validate([
            'teamName' => 'required|string|max:255',
            'tournament_id' => 'required|exists:tournaments,id',
        ]);

        // Get the selected tournament
        $tournament = Tournament::findOrFail($request->tournament_id);

        // Check the number of teams in the tournament
        $currentTeamCount = Team::where('tournament_id', $tournament->id)->count();
        if ($currentTeamCount >= $tournament->teamSize) {
            return redirect()->back()->withErrors(['tournament_id' => 'This tournament has reached the maximum team limit.']);
        }

        // Create new team
        Team::create([
            'teamName' => $request->teamName,
            'tournament_id' => $request->tournament_id,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    // Show team details
    public function show($id)
    {
        $team = Team::with('tournament')->findOrFail($id);
        return view('teams.show', compact('team'));
    }
}
