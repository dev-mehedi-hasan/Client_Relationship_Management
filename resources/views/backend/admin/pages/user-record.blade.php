@extends('layouts.master')
@section('title', 'Users')
@push('styles')
    <style>
        .table td, .table th{
            vertical-align: middle !important;
        }
    </style>
@endpush
@section('sidenavbar')
@parent
@endsection
@section('content')
 
  <div class="row shadow-sm bg-white mx-1 mt-2">
      <div class="col-12">
        <h3 class="d-flex justify-content-between m-0 py-3">User List
          <a href="{{ route('admin.users.create') }}" class="btn btn-sm text-light shadow-sm rounded-0" style="background: #19aaf8;;"><i class="fa fa-plus"></i> Add new user</a>
        </h3>
      </div>
  </div>

  <div class="row shadow-sm bg-white mx-1 mt-2 py-3">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm w-100" id="DataTable">
          <thead>
            <th>ID</th>
            <th>User_Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>User-Type</th>
            <th>Photo</th>
            <th>Status</th>
            <th>is_approved</th>
            <th>Action</th>
          </thead>
          <tbody>
  
            @foreach ($User as $users)
              <tr>
                <td>{{ $users->id }}</td>
                <td>{{ $users->user_id }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>
                  @if ($users->user_type == 3)
                      <span class="complete_btn">User</span>
                  @elseif($users->user_type == 2)
                    <span class="complete_btn">Worker</span>
                  @else
                    <span class="complete_btn">Admin</span>
                  @endif
                </td>
                <td>
                  @if ($users->photo == NULL)
                      <img style="width: 50px; height: 50px;" class="rounded-circle" src="{{ asset('public/assets/images/profile/default-user.png') }}" alt="">
                  @else
                    <img style="width: 50px; height: 50px;" class="rounded-circle" src="{{ asset('public/assets/images/profile/'.$users->photo) }}" alt="">
                  @endif
                </td>
                <td>
                  @if ($users->status == 1)
                    <span class="active_btn">Active</span>
                  @else
                    <span class="cancel_btn">Pending</span>
                  @endif
                </td>
                <td>
                  @if ($users->is_approved == 1)
                      <span class="active_btn">Approved</span>
                  @else
                    <span class="cancel_btn">Unapproved</span>
                  @endif
                </td>
                <td>
                  <div class="d-flex justify-content-center">
                    @if ($users->is_approved == 0)
                      <a href="{{ route('admin.user.actived', $users->id) }}" class="btn btn-sm shadow-sm rounded-0 text-light mr-2" style="background: #19aaf8;" title="Approved">Approved</a>
                    @else
                      <a href="{{ route('admin.user.deactived', $users->id) }}" class="btn btn-sm btn-danger shadow-sm rounded-0 text-light mr-2" title="Unapproved">Unapproved</a>
                    @endif
                      <a href="{{ route('admin.users.show', $users->id) }}" class="btn btn-sm shadow-sm rounded-0 text-light" style="background: #19aaf8;" title="View">View</a>
                  </div>
                </td>
              </tr>
            @endforeach
  
          </tbody>
        </table>
      </div>
    </div>
  </div>



@endsection






