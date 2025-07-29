<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')
            ->orderBy('phase')
            ->orderBy('due_date')
            ->get()
            ->groupBy('phase');
            
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'phase' => 'required|in:study,drilling,installation,finishing',
            'status' => 'required|in:pending,in_progress,completed',
            'project_id' => 'required|exists:projects,id',
            'due_date' => 'required|date',
            'cost' => 'required|numeric|min:0'
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        $task->load('project');
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'phase' => 'required|in:study,drilling,installation,finishing',
            'status' => 'required|in:pending,in_progress,completed',
            'project_id' => 'required|exists:projects,id',
            'due_date' => 'required|date',
            'cost' => 'required|numeric|min:0'
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
