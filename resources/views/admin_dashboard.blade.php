
@extends('layouts.app')
@section('title', 'Admin Dashboard - Construction Management')
@section('page-title', 'Admin Dashboard')
@section('page-description', 'Overview of all construction projects and activities')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Projects -->
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
        
        <!-- Completed Projects -->
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
        
        <!-- Ongoing Projects -->
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
        
        <!-- Delayed Projects -->
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
    
    <!-- Cost Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Budget vs Actual -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Budget Overview</h3>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Total Estimated Cost</span>
                    <span class="text-lg font-semibold text-blue-600">${{ number_format($totalEstimatedCost, 2) }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Total Actual Cost</span>
                    <span class="text-lg font-semibold text-green-600">${{ number_format($totalActualCost, 2) }}</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">Savings</span>
                    <span class="text-lg font-semibold text-green-600">${{ number_format($totalEstimatedCost - $totalActualCost, 2) }}</span>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
            <div class="space-y-3">
                <div class="flex items-center">
                    <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900">Project Alpha completed drilling phase</p>
                        <p class="text-xs text-gray-500">2 hours ago</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900">New team assigned to Project Beta</p>
                        <p class="text-xs text-gray-500">4 hours ago</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-900">Project Gamma deadline extended</p>
                        <p class="text-xs text-gray-500">1 day ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
