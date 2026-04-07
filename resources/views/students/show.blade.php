@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Student Details</h2>

    <div class="card p-4" style="max-width: 400px;">
        <img src="{{ asset('storage/' . $student->photo) }}" 
             alt="Student Photo" 
             class="w-32 h-32 rounded mb-3 object-cover">

        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Course:</strong> {{ $student->course }}</p>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-primary mt-3">Back</a>
</div>
@endsection
