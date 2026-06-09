@extends('layouts.app')
@section('title', 'Edit Major')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('major.edit', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Major Name"
                        value="{{ $edit->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="">Status *</label>
                    <select class="form-select" name="status" id="">
                        <option value="1" {{ $edit->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $edit->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
