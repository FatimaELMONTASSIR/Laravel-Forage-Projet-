<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Construction Management System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-6">
                <h1 class="text-xl font-bold text-gray-800">
                    <i class="fas fa-hard-hat text-blue-600 mr-2"></i>
                    ConstructPro
                </h1>
            </div>
            
            <nav class="mt-6">
                <div class="px-6 py-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Main</p>
                </div>
                
                <a href="{{ route('home') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('home') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-home w-5 h-5 mr-3"></i>
                    Home
                </a>
                
                @auth
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                    Dashboard
                </a>
                
                <a href="{{ route('projects.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('projects.*') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-project-diagram w-5 h-5 mr-3"></i>
                    Projects
                </a>
                
                <a href="{{ route('teams.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('teams.*') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-users w-5 h-5 mr-3"></i>
                    Teams
                </a>
                
                <a href="{{ route('tasks.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('tasks.*') ? 'bg-blue-50 text-blue-600 border-r-2 border-blue-600' : '' }}">
                    <i class="fas fa-tasks w-5 h-5 mr-3"></i>
                    Tasks
                </a>
                @endauth
            </nav>
            
            @auth
            <div class="absolute bottom-0 w-64 p-6">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                    </div>
                </div>
            </div>
            @endauth
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800">@yield('page-title')</h2>
                        <p class="text-sm text-gray-600">@yield('page-description')</p>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        @auth
                        <button class="p-2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-bell"></i>
                        </button>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-2 text-gray-400 hover:text-gray-600">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                        @else
                        <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</a>
                        @endauth
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>
