@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-4">Edit Student</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <label class="block mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name', $student->name) }}" class="w-full mb-4 p-2 border rounded">

        <label class="block mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email', $student->email) }}" class="w-full mb-4 p-2 border rounded">

        <label class="block mb-2">Registration Number</label>
        <input type="text" name="registration_number" value="{{ old('registration_number', $student->registration_number) }}" class="w-full mb-4 p-2 border rounded">

        <label class="block mb-2">Course</label>
        <input type="text" name="course" value="{{ old('course', $student->course) }}" class="w-full mb-4 p-2 border rounded">

        <label class="block mb-2">Year</label>
        <input type="number" name="year" value="{{ old('year', $student->year) }}" class="w-full mb-4 p-2 border rounded">

        <label class="block mb-2">Photo</label>
        <input type="file" name="photo" class="w-full mb-4 p-2 border rounded">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Student</button>
        <a href="{{ route('students.index') }}" class="ml-2 text-gray-700 hover:underline">Cancel</a>
    </form>
</div>
@endsection
