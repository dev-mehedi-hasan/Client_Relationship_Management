@extends('layouts.master')
@section('title', 'Users')
@push('styles')
<style>
    .table td,
    .table th {
        vertical-align: middle !important;
    }
</style>
@endpush
@section('sidenavbar')
@parent
@endsection
@section('content')
<section class="admin_orders">
    <div class="card-header bg-light" style="border: none;">
        <h3 class="d-flex justify-content-between m-0">User List
            <a href="{{ route('admin.users.index') }}" class="btn btn-sm text-light btn-danger shadow-sm rounded-0"><i
                    class="fas fa-backspace fa-sm"></i> Back to list</a>
        </h3>
    </div>
    <div class="card p-4">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="full name" id="name">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="email" required>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="password" required>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="confirm password" required>
                @error('confirmed_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>User Type</label>
                <select name="user_type" class="form-control" id="user_type">
                    <option value="">--Select One--</option>
                    <option value="worker">Worker</option>
                    <option value="client">Client</option>
                </select>

                @error('user_type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sm text-light" style="background: #19AAF8;">Submit</button>
            </div>

        </form>
    </div>
</section>



@endsection
