@extends('layouts.app')
@section('title', 'Instructor Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('instructor.create') }}" class="btn btn-primary">Create New Instructor</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Major</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instructors as $index => $instructor)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $instructor->name ?? '' }}</td>
                            <td>{{ $instructor->phone ?? '' }}</td>
                            <td>
                                <span class="badge text-white bg-primary">{{ $instructor->major->name ?? '' }}</span>
                                {{--  @if ($edit->major_id == $majors->name)
                                    <span class="badge text-white bg-primary">Active</span>
                                @else
                                    <span class="badge text-white bg-danger">Inactive</span>
                                @endif  --}}
                            </td>
                            <td>
                                <a href="{{ route('instructor.edit', $instructor->id) }}" class="btn btn-success icon">
                                    <i class="bi bi-pencil"></i></a>
                                <a href="{{ route('instructor.destroy', $instructor->id) }}" class="btn btn-danger icon"
                                    data-confirm-delete="true"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
