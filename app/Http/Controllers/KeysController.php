<?php

namespace App\Http\Controllers;

use App\Models\Keys;
use Illuminate\Http\Request;

class KeysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::latest()->get();
        $keys = Keys::orderByDesc('id')->get();
        $title = "Key Management";
        $text = "Are you sure you want to delete?";
        confirmDelete("Delete Key", $text);
        return view('key.index', compact('keys', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Key";
        return view('key.create', compact('title'));
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
        Keys::create($request->all());
        toast('Key Successfully Created', 'success');
        return redirect()->to('key');
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
        $edit = Keys::find($id);
        return view('key.edit', compact('title', 'edit'));
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

        Keys::find($id)->update($data);
        toast('User Successfully Updated', 'success');
        return redirect()->to('key');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Keys::find($id)->delete();
        return redirect()->to('key');
    }
}
