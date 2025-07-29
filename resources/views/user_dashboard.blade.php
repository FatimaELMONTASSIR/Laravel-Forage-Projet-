@extends('layout')

@section('title', 'User Dashboard - Construction Management')
@section('page-title', 'My Dashboard')
@section('page-description', 'Your projects and tasks overview')

@section('content')
<div class="space-y-6">
    <!-- My Projects -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">My Projects</h3>
        </div>
        <div class="p-6">
            @if($userProjects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($userProjects as $project)
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="text-sm font-medium text-gray-900">{{ $project->name }}</h4>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-{{ $project->status_color }}-100 text-{{ $project->status_color }}-800">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($project->description, 100) }}</p>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Due: {{ $project->deadline->format('M d, Y') }}</span>
                            <span>{{ $project->progress_percentage }}% Complete</span>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                                View Details →
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No projects assigned. Contact your administrator.</p>
            @endif
        </div>
    </div>
    
    <!-- My Tasks -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">My Tasks</h3>
        </div>
        <div class="p-6">
            @if($userTasks->count() > 0)
                <div class="space-y-3">
                    @foreach($userTasks as $task)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <i class="{{ $task->phase_icon }} text-gray-600 mr-3"></i>
                            <div>
                                <h4 class="text-sm font-medium text-gray-900">{{ $task->name }}</h4>
                                <p class="text-xs text-gray-500">{{ $task->project->name }} - {{ ucfirst($task->phase) }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-xs text-gray-500">{{ $task
