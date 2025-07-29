<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::withCount('projects')->get();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'leader' => 'required|string|max:255',
            'members_count' => 'required|integer|min:1',
            'specialization' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,busy'
        ]);

        Team::create($validated);

        return redirect()->route('teams.index')
            ->with('success', 'Team created successfully.');
    }

    public function show(Team $team)
    {
        $team->load('projects');
        return view('teams.show', compact('team'));
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'leader' => 'required|string|max:255',
            'members_count' => 'required|integer|min:1',
            'specialization' => 'required|string|max:255',
            'status' => 'required|in:active,inactive,busy'
        ]);

        $team->update($validated);

        return redirect()->route('teams.index')
            ->with('success', 'Team updated successfully.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        
        return redirect()->route('teams.index')
            ->with('success', 'Team deleted successfully.');
    }
}
