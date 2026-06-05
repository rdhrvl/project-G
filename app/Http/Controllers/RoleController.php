<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::orderBy('id', 'desc')->get();
        // $users = User::latest()->get();
        $roles = Role::orderByDesc('id')->get();
        $title = "Role Management";
        $text = "Are you sure you want to delete?";
        confirmDelete("Delete Role", $text);
        return view('role.index', compact('roles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create New Roles";
        return view('role.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'is_active' => 'required',
        ]);
        Role::create($request->all());
        toast('Role Successfully Created', 'success');
        return redirect()->to('role');
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
        $title = "Edit Role";
        $edit = Role::find($id);
        return view('role.edit', compact('title', 'edit'));
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

        Role::find($id)->update($data);
        toast('User Successfully Updated', 'success');
        return redirect()->to('role');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Role::find($id)->delete();
        return redirect()->to('role');
    }
}
