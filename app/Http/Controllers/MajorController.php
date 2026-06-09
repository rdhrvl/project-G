<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::latest()->get();
        $majors = Major::orderByDesc('id')->get();
        $title = "Major Management";
        $text = "Are you sure you want to delete?";
        confirmDelete("Delete Major", $text);
        return view('major.index', compact('majors', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Major";
        return view('major.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        Major::create($request->all());
        toast('Major Successfully Created', 'success');
        return redirect()->to('major');
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
        $title = "Edit Major";
        $edit = Major::find($id);
        return view('major.edit', compact('title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'name' => $request->name,
            'status' => $request->status
            // 'password' => $request->password,
        ];
        // Jika user Input Password
        if (filled($request->status)) {
            $data['status'] = $request->status;
        }

        Major::find($id)->update($data);
        toast('User Successfully Updated', 'success');
        return redirect()->to('major');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Major::find($id)->delete();
        return redirect()->to('major');
    }
}
