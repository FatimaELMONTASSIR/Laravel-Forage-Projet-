@extends('layouts.app')

@section('title', 'Project Details - Construction Management')
@section('page-title', 'Downtown Office Complex')
@section('page-description', 'Commercial drilling project details and progress')

@section('content')
<div class="space-y-6">
    <!-- Project Header -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start">
            <div class="flex items-center">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-building text-blue-600 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h1 class="text-2xl font-bold text-gray-900">Downtown Office Complex</h1>
                    <p class="text-gray-600">Commercial drilling project</p>
                    <div class="flex items-center mt-2">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            In Progress
                        </span>
                        <span class="ml-4 text-sm text-gray-500">Started: Oct 15, 2024</span>
                    </div>
                </div>
            </div>
            
            <div class="flex space-x-2">
                <a href="{{ route('projects.edit', 1) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    <i class="fas fa-edit mr-2"></i>Edit Project
                </a>
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    <i class="fas fa-file-pdf mr-2"></i>Export PDF
                </button>
            </div>
        </div>
    </div>
    
    <!-- Project Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Budget Information -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Budget Overview</h3>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-sm text-gray-600">Initial Budget:</span>
                    <span class="text-sm font-semibold text-gray-900">$450,000</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-600">Actual Cost:</span>
                    <span class="text-sm font-semibold text-green-600">$380,000</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-600">Remaining:</span>
                    <span class="text-sm font-semibold text-blue-600">$70,000</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-600 h-2 rounded-full" style="width: 84%"></div>
                </div>
                <p class="text-xs text-gray-500">84% of budget used</p>
            </div>
        </div>
        
        <!-- Timeline Information -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Timeline</h3>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-sm text-gray-600">Start Date:</span>
                    <span class="text-sm font-semibold text-gray-900">Oct 15, 2024</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-600">Planned End:</span>
                    <span class="text-sm font-semibold text-gray-900">Dec 15, 2024</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm text-gray-600">Actual Progress:</span>
                    <span class="text-sm font-semibold text-yellow-600">65% Complete</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-yellow-500 h-2 rounded-full" style="width: 65%"></div>
                </div>
                <p class="text-xs text-gray-500">On schedule</p>
            </div>
        </div>
        
        <!-- Team Information -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Team Assignment</h3>
            <div class="space-y-3">
                <div>
                    <p class="text-sm text-gray-600">Assigned Team:</p>
                    <p class="text-sm font-semibold text-gray-900">Team Alpha</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Project Manager:</p>
                    <p class="text-sm font-semibold text-gray-900">John Smith</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Team Size:</p>
                    <p class="text-sm font-semibold text-gray-900">8 members</p>
                </div>
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs">JS</div>
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-xs">MD</div>
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white text-xs">SJ</div>
                    <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center text-white text-xs">+5</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Project Phases -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Phases</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 mr-3"></i>
                    <div>
                        <p class="font-medium text-gray-900">Study Phase</p>
                        <p class="text-sm text-gray-600">Site analysis and planning completed</p>
                    </div>
                </div>
                <span class="text-sm font-semibold text-green-600">Completed</span>
            </div>
            
            <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-lg border-l-4 border-yellow-500">
                <div class="flex items-center">
                    <i class="fas fa-clock text-yellow-600 mr-3"></i>
                    <div>
                        <p class="font-medium text-gray-900">Drilling Phase</p>
                        <p class="text-sm text-gray-600">Foundation drilling in progress</p>
                    </div>
                </div>
                <span class="text-sm font-semibold text-yellow-600">65% Complete</span>
            </div>
            
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border-l-4 border-gray-300">
                <div class="flex items-center">
                    <i class="fas fa-circle text-gray-400 mr-3"></i>
                    <div>
                        <p class="font-medium text-gray-900">Installation Phase</p>
                        <p class="text-sm text-gray-600">Equipment installation pending</p>
                    </div>
                </div>
                <span class="text-sm font-semibold text-gray-500">Pending</span>
            </div>
            
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border-l-4 border-gray-300">
                <div class="flex items-center">
                    <i class="fas fa-circle text-gray-400 mr-3"></i>
                    <div>
                        <p class="font-medium text-gray-900">Finishing Phase</p>
                        <p class="text-sm text-gray-600">Final touches and cleanup</p>
                    </div>
                </div>
                <span class="text-sm font-semibold text-gray-500">Pending</span>
            </div>
        </div>
    </div>
</div>
@endsection
