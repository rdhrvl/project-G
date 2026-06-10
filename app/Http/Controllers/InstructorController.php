<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::latest()->get();
        $instructors = Instructor::with('major')->orderByDesc('id')->get();
        $majors = Major::get();

        $title = "Instructor Management";
        $text = "Are you sure you want to delete?";
        confirmDelete("Delete Instructor", $text);
        return view('instructor.index', compact('instructors', 'title', 'majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Instructor";
        $majors = Major::get();
        return view('instructor.create', compact('title', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'major_id' => 'required',
                'name' => 'required',
                'phone' => 'nullable',
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'major.required' => 'Major is required.',
                'name.required' => 'Student name is required.',
                'email.required' => 'Email is required.',
                'email.unique' => 'Email is Already Exists.',
                'password.required' => 'Password is required.',
            ]
        );
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            Instructor::create([
                'name' => $request->name,
                'user_id' => $user->id,
                'major_id' => $request->major_id,
                'phone' => $request->phone
            ]);
            DB::Commit();
            toast('Instructor Successfully Created', 'success');
            return redirect()->to('instructor');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
            toast('Fail!!', $th->getMessage());
            return back()->withInput();
        }
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
        $title = "Edit Instructor";
        $edit = Instructor::find($id);
        $majors = Major::get();
        $instructors = Instructor::with('major')->orderByDesc('id')->get();
        return view('instructor.edit', compact('title', 'edit', 'majors', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instructor $instructor)
    {
        try {
            $dataUser = [
                'name' => $request->name,
                'email' => $request->email
            ];
            $user = $instructor->user;
            if ($request->filled('password')) {
                $dataUser['password'] = $request->password;
            }
            $user->update($dataUser);
            $data = [
                'major_id' => $request->major_id,
                'name' => $request->name,
                'phone' => $request->phone,
            ];

            $instructor->update($data);
            DB::commit();
            toast('Instructor Successfully Updated', 'success');
            return redirect()->to('instructor');
        } catch (\Throwable $th) {
            DB::rollBack();
            toast('Fail!', $th->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Instructor::find($id)->delete();
            toast('Instructor Successfully Deleted', 'success');
            return redirect()->to('instructor');
        } catch (\Throwable $th) {
            DB::rollBack();
            toast('Fail!!', $th->getMessage());
        }
    }
}
