@extends('layouts.app')

@section('title', 'Students List')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">Students List</h1>
        <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded shadow hover:bg-blue-700 transition duration-200">
            Add New Student
        </a>
    </div>

    <!-- Search Form -->
<form action="{{ route('students.index') }}" method="GET" class="mb-4 flex gap-2">
    <input type="text" name="search" value="{{ request('search')}}" placeholder="Search by ID name course  registration number...." 
        class="border border-gray-300 rounded px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition duration-200"
    >Search</button>
</form>

    <!-- Table Container -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-400 p-4">
            <h2 class="text-white font-semibold text-lg">All Students</h2>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reg. No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Photo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($students as $student)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->registration_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->course }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->year }}</td>
                            
                            <!-- Photo column -->
                            <td class="px-6 py-4 whitespace-nowraps">
                                @if($student->photo)
                                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo" class="w-12 h-12 rounded-full object-cover shadow-md border-2 border-blue-500 ">
                                   {{-- // <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo" class="w-16 h-16 rounded-full object-cover"> --}}

                                @else
                                    <span class="text-gray-500">No photo</span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4 whitespace-nowrap flex gap-2">

                                 {{-- edit student button --}}
                                <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded shadow hover:bg-yellow-500 transition duration-200">Edit</a>
                                    {{-- view student button --}}
                                    <a href="{{ route('students.show', $student->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded shadow hover:bg-blue-600 transition duration-200">View</a>
                                    
                                    {{-- delete student button --}}

                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded shadow hover:bg-red-600 transition duration-200">Delete</button>
                                </form>
                               


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <!-- Pagination -->
<div class="mt-4 flex justify-center">
    {{ $students->links() }}
</div>

        </div>
    </div>
</div>
@endsection
