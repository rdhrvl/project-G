@extends('layouts.app')
@section('title', 'Create New User')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h3>{{ $title ?? '' }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter User Name" required>

                </div>
                <div class="mb-3">
                    <label for="">Email *</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter User Email" required>
                </div>
                <div class="mb-3">
                    <label for="">Password *</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter User Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
