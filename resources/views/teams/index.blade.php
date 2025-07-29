@extends('layouts.app')

@section('title', 'Teams - Construction Management')
@section('page-title', 'Teams')
@section('page-description', 'Manage construction and drilling teams')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div class="flex space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search teams..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
        </div>
        
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Create New Team
        </button>
    </div>
    
    <!-- Teams Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Team Alpha -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-semibold text-gray-900">Team Alpha</h3>
                        <p class="text-sm text-gray-600">Drilling Specialists</p>
                    </div>
                </div>
                
                <div class="flex space-x-2">
                    <button class="text-green-600 hover:text-green-900" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-900" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <div class="space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Team Leader:</span>
                    <span class="font-medium text-gray-900">John Smith</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Members:</span>
                    <span class="font-medium text-gray-900">8 people</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Active Projects:</span>
                    <span class="font-medium text-blue-600">2</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Status:</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>
            
            <div class="mt-4">
                <p class="text-xs text-gray-500 mb-2">Team Members:</p>
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs">JS</div>
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-xs">MD</div>
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center text-white text-xs">SJ</div>
                    <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center text-white text-xs">RB</div>
                    <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center text-white text-xs">+4</div>
                </div>
            </div>
        </div>
        
        <!-- Team Beta -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-semibold text-gray-900">Team Beta</h3>
                        <p class="text-sm text-gray-600">Foundation Experts</p>
                    </div>
                </div>
                
                <div class="flex space-x-2">
                    <button class="text-green-600 hover:text-green-900" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-900" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <div class="space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Team Leader:</span>
                    <span class="font-medium text-gray-900">Sarah Johnson</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Members:</span>
                    <span class="font-medium text-gray-900">6 people</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Active Projects:</span>
                    <span class="font-medium text-blue-600">1</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Status:</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        Active
                    </span>
                </div>
            </div>
            
            <div class="mt-4">
                <p class="text-xs text-gray-500 mb-2">Team Members:</p>
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center text-white text-xs">SJ</div>
                    <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-white text-xs">TW</div>
                    <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white text-xs">AL</div>
                    <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center text-white text-xs">+3</div>
                </div>
            </div>
        </div>
        
        <!-- Team Gamma -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-purple-600 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-semibold text-gray-900">Team Gamma</h3>
                        <p class="text-sm text-gray-600">Installation Crew</p>
                    </div>
                </div>
                
                <div class="flex space-x-2">
                    <button class="text-green-600 hover:text-green-900" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-600 hover:text-red-900" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            
            <div class="space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Team Leader:</span>
                    <span class="font-medium text-gray-900">Mike Davis</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Members:</span>
                    <span class="font-medium text-gray-900">10 people</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Active Projects:</span>
                    <span class="font-medium text-blue-600">3</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Status:</span>
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Busy
                    </span>
                </div>
            </div>
            
            <div class="mt-4">
                <p class="text-xs text-gray-500 mb-2">Team Members:</p>
                <div class="flex -space-x-2">
                    <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center text-white text-xs">MD</div>
                    <div class="w-8 h-8 bg-teal-500 rounded-full flex items-center justify-center text-white text-xs">KL</div>
                    <div class="w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-white text-xs">NP</div>
                    <div class="w-8 h-8 bg-gray-500 rounded-full flex items-center justify-center text-white text-xs">+7</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
