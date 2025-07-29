<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('team')->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('projects.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:planning,in_progress,completed,delayed',
            'deadline' => 'required|date',
            'budget' => 'required|numeric|min:0',
            'team_id' => 'nullable|exists:teams,id',
            'phases' => 'array'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['phases'] = json_encode($request->phases ?? []);

        Project::create($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('team', 'tasks');
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $teams = Team::all();
        return view('projects.edit', compact('project', 'teams'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:planning,in_progress,completed,delayed',
            'deadline' => 'required|date',
            'budget' => 'required|numeric|min:0',
            'actual_cost' => 'nullable|numeric|min:0',
            'team_id' => 'nullable|exists:teams,id',
            'phases' => 'array'
        ]);

        $validated['phases'] = json_encode($request->phases ?? []);

        $project->update($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        
        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
