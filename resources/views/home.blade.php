@extends('layout')

@section('title', 'Home - Construction Management')
@section('page-title', 'Welcome to ConstructPro')
@section('page-description', 'Professional construction and drilling project management')

@section('content')
<div class="space-y-6">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg shadow-lg p-8 text-white">
        <div class="max-w-4xl">
            <h1 class="text-4xl font-bold mb-4">Manage Your Construction Projects</h1>
            <p class="text-xl mb-6">Streamline your drilling and construction operations with our comprehensive project management system.</p>
            @guest
            <div class="space-x-4">
                <a href="{{ route('register') }}" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">
                    Get Started
                </a>
                <a href="{{ route('login') }}" class="border border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600">
                    Login
                </a>
            </div>
            @endguest
        </div>
    </div>
    
    @auth
    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100">
                    <i class="fas fa-project-diagram text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Projects</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $totalProjects }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Completed</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $completedProjects }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Ongoing</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $ongoingProjects }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Delayed</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $delayedProjects }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Projects -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Recent Projects</h3>
        </div>
        <div class="p-6">
            @if($recentProjects->count() > 0)
                <div class="space-y-4">
                    @foreach($recentProjects as $project)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-building text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">{{ $project->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $project->team->name ?? 'No team assigned' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-{{ $project->status_color }}-100 text-{{ $project->status_color }}-800">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                            <a href="{{ route('projects.show', $project) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-8">No projects found. <a href="{{ route('projects.create') }}" class="text-blue-600 hover:text-blue-800">Create your first project</a>.</p>
            @endif
        </div>
    </div>
    @endauth
</div>
@endsection
