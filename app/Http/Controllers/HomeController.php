<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Team;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalProjects = Project::count();
        $completedProjects = Project::where('status', 'completed')->count();
        $ongoingProjects = Project::where('status', 'in_progress')->count();
        $delayedProjects = Project::where('status', 'delayed')->count();
        
        $totalEstimatedCost = Project::sum('budget');
        $totalActualCost = Project::sum('actual_cost');
        
        $recentProjects = Project::with('team')
            ->orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        return view('home', compact(
            'totalProjects',
            'completedProjects', 
            'ongoingProjects',
            'delayedProjects',
            'totalEstimatedCost',
            'totalActualCost',
            'recentProjects'
        ));
    }

    public function adminDashboard()
    {
        $totalProjects = Project::count();
        $completedProjects = Project::where('status', 'completed')->count();
        $ongoingProjects = Project::where('status', 'in_progress')->count();
        $delayedProjects = Project::where('status', 'delayed')->count();
        
        $totalEstimatedCost = Project::sum('budget');
        $totalActualCost = Project::sum('actual_cost');
        
        return view('admin_dashboard', compact(
            'totalProjects',
            'completedProjects',
            'ongoingProjects', 
            'delayedProjects',
            'totalEstimatedCost',
            'totalActualCost'
        ));
    }

    public function userDashboard()
    {
        $userProjects = Project::where('user_id', auth()->id())
            ->with('team', 'tasks')
            ->get();
            
        $userTasks = Task::whereHas('project', function($query) {
            $query->where('user_id', auth()->id());
        })->get();

        return view('user_dashboard', compact('userProjects', 'userTasks'));
    }
}
