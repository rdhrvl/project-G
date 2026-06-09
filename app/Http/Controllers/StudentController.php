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
        $title = "Student Management";
        $text = "Are you sure you want to delete?";
        confirmDelete("Delete Student", $text);
        return view('student.index', compact('students', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Roles";
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
    public function edit(string $id)
    {
        $title = "Edit Student";
        $edit = Student::find($id);
        return view('student.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active
            // 'password' => $request->password,
        ];
        // Jika user Input Password
        if (filled($request->is_active)) {
            $data['is_active'] = $request->is_active;
        }

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
