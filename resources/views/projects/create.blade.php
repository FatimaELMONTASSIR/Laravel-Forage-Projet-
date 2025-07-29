@extends('layouts.app')

@section('title', 'Create Project - Construction Management')
@section('page-title', 'Create New Project')
@section('page-description', 'Add a new construction or drilling project')

@section('content')
<div class="max-w-4xl mx-auto">
    <form action="{{ route('projects.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Project Information -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Project Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>
                
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="planning">Planning</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="delayed">Delayed</option>
                    </select>
                </div>
                
                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">Deadline</label>
                    <input type="date" id="deadline" name="deadline" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                </div>
                
                <div>
                    <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">Budget ($)</label>
                    <input type="number" id="budget" name="budget" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" step="0.01" required>
                </div>
            </div>
            
            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
            </div>
        </div>
        
        <!-- Team Assignment -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Team Assignment</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="team_id" class="block text-sm font-medium text-gray-700 mb-2">Assign Team</label>
                    <select id="team_id" name="team_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select a team</option>
                        <option value="1">Team Alpha - Drilling Specialists</option>
                        <option value="2">Team Beta - Foundation Experts</option>
                        <option value="3">Team Gamma - Installation Crew</option>
                    </select>
                </div>
                
                <div>
                    <label for="project_manager" class="block text-sm font-medium text-gray-700 mb-2">Project Manager</label>
                    <select id="project_manager" name="project_manager" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Select project manager</option>
                        <option value="1">John Smith</option>
                        <option value="2">Sarah Johnson</option>
                        <option value="3">Mike Davis</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Project Phases -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Project Phases</h3>
            
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" id="phase_study" name="phases[]" value="study" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="phase_study" class="ml-2 block text-sm text-gray-900">Study Phase</label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="phase_drilling" name="phases[]" value="drilling" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="phase_drilling" class="ml-2 block text-sm text-gray-900">Drilling Phase</label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="phase_installation" name="phases[]" value="installation" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="phase_installation" class="ml-2 block text-sm text-gray-900">Installation Phase</label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="phase_finishing" name="phases[]" value="finishing" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="phase_finishing" class="ml-2 block text-sm text-gray-900">Finishing Phase</label>
                </div>
            </div>
        </div>
        
        <!-- Form Actions -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('projects.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Create Project
            </button>
        </div>
    </form>
</div>
@endsection
