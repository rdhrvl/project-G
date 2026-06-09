<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::latest()->get();
        $students = Student::with('major')->orderByDesc('id')->get();
        $majors = Major::get();

        $title = "Student Management";
        $text = "Are you sure you want to delete?";
        confirmDelete("Delete Student", $text);
        return view('student.index', compact('students', 'title', 'majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Student";
        $majors = Major::get();
        return view('student.create', compact('title', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'major_id' => 'required',
            'name' => 'required',
            'phone' => 'nullable',
        ]);
        Student::create($request->all());
        toast('Student Successfully Created', 'success');
        return redirect()->to('student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $title = "Edit Student";
        $edit = Student::find($id);
        $majors = Major::get();
        $students = Student::with('major')->orderByDesc('id')->get();
        return view('student.edit', compact('title', 'edit', 'majors', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'major_id' => $request->major_id,
            'name' => $request->name,
            'phone' => $request->phone,
        ];

        Student::find($id)->update($data);
        toast('User Successfully Updated', 'success');
        return redirect()->to('student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Student::find($id)->delete();
        return redirect()->to('student');
    }
}
