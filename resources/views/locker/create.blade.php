@extends('layouts.app')
@section('title', 'Create New Locker')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('locker.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Locker Code *</label>
                    <input type="text" name="locker_name" class="form-control @error('locker_name') is-invalid @enderror"
                        value="{{ old('locker_name') }}" placeholder="Enter Locker Name">
                    @error('locker_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="">Batch *</label>
                    <select class="form-select" name="batch">
                        <option value="">--Choose Your Batch--</option>
                        <option value="1">Batch 1</option>
                        <option value="2">Batch 2</option>
                        <option value="3">Batch 3</option>
                        <option value="4">Batch 4</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Major *</label>
                    <select class="form-select" name="major_name">
                        <option value="">--Choose Your Major--</option>
                        <option value="Web Programming">Web Programming</option>
                        <option value="Content Creator">Content Creator</option>
                        <option value="Network Engineering">Network Engineering</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Status *</label>
                    <select class="form-select" name="status">
                        <option value="">--Choose Status--</option>
                        <option value="Unavailable">Unavailable</option>
                        <option value="Available">Available</option>
                        <option value="Broken">Broken</option>
                        <option value="Missing">Missing</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
