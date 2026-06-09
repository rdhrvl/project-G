@extends('layouts.app')
@section('title', 'Student Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('student.create') }}" class="btn btn-primary">Create New Student</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $student->name ?? '' }}</td>
                            <td>
                                @if ($student->status == 1)
                                    <span class="badge text-white bg-primary">Active</span>
                                @else
                                    <span class="badge text-white bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success icon">
                                    <i class="bi bi-pencil"></i></a>
                                <form action="{{ route('student.destroy', $student->id) }}" method="post" class="d-inline"
                                    data-confirm-delete="true">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
