@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-teal-700">🎓 Add New Student</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 shadow">
            <strong>Whoops!</strong> Please fix the errors below:
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium mb-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
            <div>
    <label class="block text-gray-700 font-medium mb-1">Gender</label>
    <select name="gender" 
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
        <option value="">- -Select Gender - -</option>
        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
    </select>
</div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Registration Number</label>
                <input type="text" name="registration_number" value="{{ old('registration_number') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Course</label>
                <input type="text" name="course" value="{{ old('course') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Year</label>
                <select name="year"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <option value="">-- Select Year --</option>
                    <option value="Year 1" {{ old('year')=='Year 1' ? 'selected':'' }}>Year 1</option>
                    <option value="Year 2" {{ old('year')=='Year 2' ? 'selected':'' }}>Year 2</option>
                    <option value="Year 3" {{ old('year')=='Year 3' ? 'selected':'' }}>Year 3</option>
                    <option value="Year 4" {{ old('year')=='Year 4' ? 'selected':'' }}>Year 4</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-1">Contact Number</label>
                <input type="text" name="contact_number" value="{{ old('contact_number') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>
            <div>
    <label class="block text-gray-700 font-medium mb-1">Photo</label>
    <input type="file" name="photo"
           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">
</div>

        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-1">Address</label>
            <textarea name="address" rows="3"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400">{{ old('address') }}</textarea>
        </div>

        <div class="flex justify-end space-x-2 mt-4">
            <a href="{{ route('students.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit"
                    class="px-4 py-2 bg-teal-600 text-white rounded hover:bg-teal-700">💾 Save Student</button>
        </div>
    </form>
</div>
@endsection
