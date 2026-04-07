<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusLink - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-gradient-to-r from-teal-600 to-teal-500 text-white px-6 py-4 shadow flex justify-between items-center">
        <div class="text-2xl font-bold tracking-wide">CampusLink</div>
        <nav class="space-x-4 flex items-center">
            <a href="/" class="hover:underline hover:text-yellow-300 transition">Dashboard</a>
            <a href="{{ route('students.index') }}" class="hover:underline hover:text-yellow-300 transition">Students</a>
            <a href="#" class="hover:underline hover:text-yellow-300 transition">Courses</a>
            <a href="#" class="hover:underline hover:text-yellow-300 transition">Lecturers</a>

            @auth
                <span class="text-yellow-200 font-semibold">Hi, {{ Auth::user()->name }}!</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-white text-teal-600 px-3 py-1 rounded hover:bg-yellow-300 hover:text-teal-800 transition font-semibold">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="bg-white text-teal-600 px-3 py-1 rounded hover:bg-yellow-300 transition font-semibold">
                    Login
                </a>
            @endguest
        </nav>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="bg-gradient-to-b from-teal-100 to-teal-50 w-64 p-6 hidden md:block rounded-r-lg shadow-lg">
            <h2 class="font-semibold mb-4 text-gray-700 text-lg">Navigation</h2>
            <ul class="space-y-3">
                <li><a href="/" class="block px-3 py-2 rounded hover:bg-teal-200 hover:text-teal-800 transition">Dashboard</a></li>
                <li><a href="{{ route('students.index') }}" class="block px-3 py-2 rounded hover:bg-teal-200 hover:text-teal-800 transition">Students</a></li>
                <li><a href="#" class="block px-3 py-2 rounded hover:bg-teal-200 hover:text-teal-800 transition">Courses</a></li>
                <li><a href="#" class="block px-3 py-2 rounded hover:bg-teal-200 hover:text-teal-800 transition">Lecturers</a></li>
            </ul>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-6">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 shadow">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4 shadow">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-teal-600 text-white text-center py-4 mt-auto">
        <p>&copy; {{ date('Y') }} CampusLink. All rights reserved.</p>
    </footer>

</body>
</html>