<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // GET /api/students — return all students

    {
        $students = Student::all();
        return response()->json([
            'success' => true,
            'data'    => $students,
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  // POST /api/students — create a new student
    {
        $student = Student::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Student created successfully.',
            'data'    => $student,
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)  // GET /api/students/{id} — return one student
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found.',
            ], 404);
        }
        return response()->json(['success' => true, 'data' => $student], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  // PUT /api/students/{id} — update a student
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found.',
            ], 404);
        }
        $student->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully.',
            'data'    => $student,
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)  // DELETE /api/students/{id} — delete a student
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found.',
            ], 404);
        }
        $student->delete();
        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully.',
        ], 200);

    }
}
