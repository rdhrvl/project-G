@extends('layouts.app')
@section('title', 'Create New Instructor')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid
                    @enderror"
                        placeholder="Enter Instructor Name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Major *</label>
                    <select class="form-select @error('major_id') is-invalid
                    @enderror" name="major_id"
                        id="">
                        <option value="">--Select Major--</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                    @error('major_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Phone *</label>
                    <input type="number" name="phone"
                        class="form-control @error('phone') is-invalid
                    @enderror"
                        placeholder="Enter Phone Number Ex:0812345678" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Email *</label>
                    <input type="email" name="email"
                        class="form-control @error('email') is-invalid
                    @enderror"
                        placeholder="Enter Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Password *</label>
                    <input type="password" name="password"
                        class="form-control @error('password') is-invalid
                    @enderror"
                        placeholder="Enter Password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
