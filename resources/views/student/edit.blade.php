@extends('layouts.app')
@section('title', 'Create New Student')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('student.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" value="{{ $edit->name }}"
                        placeholder="Enter Student Name" required>
                </div>
                <div class="mb-3">
                    <label for="">Major *</label>
                    <select class="form-select" name="major_id" id="">
                        {{--  @foreach ($majors as $major)
                            <option value="{{ $major->id }}">
                                {{ $major->name }}</option>
                        @endforeach  --}}
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}" {{ $major->id == $edit->major_id ? 'selected' : '' }}>
                                {{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="number" name="phone" value="{{ $edit->phone }}" class="form-control"
                        placeholder="Enter Phone Number Ex:0812345678" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
