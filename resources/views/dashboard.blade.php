@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Students Card -->

        <div class="bg-white rounded-lg shadow p-5 flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Students</h2>
                <p class="mt-2 text-gray-500">Total registered students</p>
            </div>
            <div class="mt-4 text-3xl font-bold text-teal-600">
                {{ \App\Models\Student::count() }}
            </div>
        </div>

        <!-- Courses Card -->
        <div class="bg-white rounded-lg shadow p-5 flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Courses</h2>
                <p class="mt-2 text-gray-500">Total courses available</p>
            </div>
            <div class="mt-4 text-3xl font-bold text-teal-600">
                12 {{-- Replace with dynamic count if you have a Course model --}}
            </div>
        </div>

        <!-- Lecturers Card -->
        <div class="bg-white rounded-lg shadow p-5 flex flex-col justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-700">Lecturers</h2>
                <p class="mt-2 text-gray-500">Total lecturers</p>
            </div>
            <div class="mt-4 text-3xl font-bold text-teal-600">
                5 {{-- Replace with dynamic count if you have a Lecturer model --}}
            </div>
        </div>
    </div>
</div>
@endsection
