@extends('layouts.app')
@section('title', 'Edit Locker')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('locker.update', $edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Locker Code *</label>
                    <input type="text" name="locker_name" class="form-control @error('locker_name') is-invalid @enderror"
                        value="{{ isset($edit) ? $edit->locker_name : old('locker_name') }}"
                        placeholder="Enter Locker Name">
                    @error('locker_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="">Batch *</label>
                    <select class="form-select" name="batch">
                        <option value="">--Choose Your Batch--</option>
                        <option value="1" {{ $edit->batch == 1 ? 'selected' : '' }}>Batch 1</option>
                        <option value="2" {{ $edit->batch == 2 ? 'selected' : '' }}>Batch 2</option>
                        <option value="3" {{ $edit->batch == 3 ? 'selected' : '' }}>Batch 3</option>
                        <option value="4" {{ $edit->batch == 4 ? 'selected' : '' }}>Batch 4</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Major *</label>
                    <select class="form-select" name="major_name">
                        <option value="">--Choose Your Major--</option>
                        <option value="Web Programming" {{ $edit->major_name == 'Web Programming' ? 'selected' : '' }}>Web
                            Programming
                        </option>
                        <option value="Content Creator" {{ $edit->major_name == 'Content Creator' ? 'selected' : '' }}>
                            Content
                            Creator
                        </option>
                        <option value="Network Engineering"
                            {{ $edit->major_name == 'Network Engineering' ? 'selected' : '' }}>Network
                            Engineering</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Status *</label>
                    <select class="form-select" name="status">
                        <option value="">--Choose Status--</option>
                        <option value="Unavailable" {{ $edit->status == 'Unavailable' ? 'selected' : '' }}>Unavailable
                        </option>
                        <option value="Available" {{ $edit->status == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Broken" {{ $edit->status == 'Broken' ? 'selected' : '' }}>Broken</option>
                        <option value="Missing" {{ $edit->status == 'Missing' ? 'selected' : '' }}>Missing</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
