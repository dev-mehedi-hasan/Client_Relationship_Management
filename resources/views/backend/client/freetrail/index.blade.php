@extends('layouts.master')
@section('title', 'free trail')
@push('styles')
<style>

</style>
@endpush
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')

    <div class="row shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <h3 class="d-flex justify-content-between py-3 m-0">Free Trails
                <a href="{{ route('client.freetrail.create') }}" class="btn btn-sm rounded-0 text-light px-3 shadow-sm btn-bg-color"><i class="fa fa-plus fa-sm"></i> New Order</a>
            </h3>
        </div>
    </div>

    <div class="row bg-white shadow-sm  mx-1 mt-3">
        <div class="col-12">
            <div class="table-responsive py-3">
                <table class="table table-bordered table-sm" id="DataTable">
                    <thead>
                        <th style="font-weight: 700 !important;">ID</th>
                        <th style="font-weight: 700 !important;">Order ID</th>
                        <th style="font-weight: 700 !important;">Order Date</th>
                        <th style="font-weight: 700 !important;">Deadline</th>
                        <th style="font-weight: 700 !important;">Image</th>
                        <th style="font-weight: 700 !important;">Action</th>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
