@extends('layouts.app')
@section('title', 'Locker Management')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('locker.create') }}" class="btn btn-primary">Create New Locker</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Batch</th>
                        <th>Major</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lockers as $index => $locker)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $locker->locker_name ?? '' }}</td>
                            <td>{{ $locker->batch }}</td>
                            <td>{{ $locker->major_name }}</td>
                            <td>
                                @if ($locker->status == 'Available')
                                    <span class="badge text-white bg-primary">Available</span>
                                @elseif ($locker->status == 'Unavailable')
                                    <span class="badge text-white bg-secondary">Unavailable</span>
                                @elseif ($locker->status == 'Broken')
                                    <span class="badge text-white bg-warning">Broken</span>
                                @elseif ($locker->status == 'Missing')
                                    <span class="badge text-white bg-danger">Missing</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('locker.edit', $locker->id) }}" class="btn btn-success icon">
                                    <i class="bi bi-pencil"></i></a>
                                <a href="{{ route('locker.destroy', $locker->id) }}" class="btn btn-danger"
                                    data-confirm-delete="true">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
