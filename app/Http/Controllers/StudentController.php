<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // get  input  user typed
        $search = $request->input('search');

        $perPage = 5;

        // quering the students model
        $students = Student::when($search, function ($query, $search) {
            // add search filter only if user typed something
            $query->where('name', 'like', '%' . $search . '%');
        })
            ->orderBy('created_at', 'desc') // Newest first
            ->paginate($perPage)           // Paginate results
            ->withQueryString();           // Keep search term in URL

        return view('students.index', compact('students', 'search'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input and store in $validated
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'registration_number' => 'required|unique:students,registration_number',
            'course' => 'required|string',
            'year' => 'required|string',
            'contact_number' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath; // Add to validated data
        }

        //Create student with validated data
        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // 1️⃣ Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'registration_number' => 'required|string|max:50',
            'course' => 'required|string|max:100',
            'year' => 'required|integer|min:1|max:10',
            'photo' => 'nullable|image|max:2048', // optional photo
        ]);

        // 2️⃣ Handle photo upload if there is a new photo
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($student->photo && file_exists(storage_path('app/public/' . $student->photo))) {
                unlink(storage_path('app/public/' . $student->photo));
            }

            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }

        // 3️⃣ Update student
        $student->update($validated);

        // 4️⃣ Redirect back to index or show page
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete(); //delete a record
        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
