@extends('layouts.master')
@section('title', 'Users')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"/>
<style>
  .table td, .table th{
    vertical-align: middle !important;
  }
  .dropify-wrapper .dropify-message p {
        font-size: 16px !important;
        color: #a2a2a2 !important;
    }
    .card-titles{
        text-transform: uppercase;
        color: rgba(13, 27, 62, 0.7);
        font-size: 14px !important;
        margin-bottom: 15px;
    }
</style>
@endpush
@section('sidenavbar')
@parent
@endsection
@section('content')

<div class="row shadow-sm bg-white mx-1 mt-2">
    <div class="col-12">
        <h3 class="m-0 py-3 text-font-family">Profile Security</h3>
    </div>
</div>

<form action="{{ route('user.password.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mx-1 mt-2">
        <div class="col-xl-8 col-sm-8 col-12 bg-white shadow-sm">
            <div class="card py-3 border-0">
                <div class="card-body p-0">
                    <h4 class="card-titles font-weight-bold text-font-family">password change</h4>

                    <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" min="8" required>
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" min="8" required>
                        @error('new_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" >
                        @error('confirm_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-bg-color text-light rounded-0">Update</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</form>



@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
    $('.avatars').dropify();
    $('#datetimepicker4').datetimepicker();
</script>
@endpush