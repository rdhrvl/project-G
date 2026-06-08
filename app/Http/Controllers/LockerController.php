<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lockers = Locker::orderByDesc('id')->get();
        $title = "Locker Management";;
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('locker.index', compact('lockers', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'locker_name' => 'required|unique:lockers,locker_name',
                'batch' => 'required',
                'major_name' => 'required',
                'status' => 'required'
            ],
            [
                'locker_name.unique' => 'Locker name already exists.',
                'locker_name.required' => 'Locker name is required.',
            ]
        );
        Locker::create($request->all());
        toast('Locker Successfully Created', 'success');
        return redirect()->to('locker');
    }

    /**
     * Display the specified resource.
     */
    public function show(Locker $locker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Locker::find($id);
        return view('locker.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            // $data = Locker::find($id);
            // $data->update($request->all());
            // $data = [
            //     'locker_name' => $request->locker_name,
            //     'batch' => $request->batch,
            //     'major_name' => $request->major_name,
            //     'status' => $request->status
            //     // 'password' => $request->password,
            // ];
            $request->validate(
                [
                    'locker_name' => ['required', Rule::unique('lockers', 'locker_name')->ignore($id)],
                    'batch' => 'required',
                    'major_name' => 'required',
                    'status' => 'required'
                ],
                [
                    'locker_name.unique' => 'Locker name already exists.',
                    'locker_name.required' => 'Locker name is required.',
                ]
            );

            $data = Locker::find($id);
            $data->update(
                $request->all()
            );
            toast('Locker Successfully Updated', 'success');
            return redirect()->to('locker');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Locker::find($id)->delete();
        toast('Locker Successfully Deleted', 'success');
        return redirect()->to('locker');
    }
}
