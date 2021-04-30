@extends('layouts.master')
@section('title', 'Order')
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')

    <div class="row shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <h3 class="py-3 m-0 text-font-family">Order List</h3>
        </div>
    </div>
    <div class="row p-4 shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped w-100" id="DataTable">
                    <thead>
                        <th style="font-weight: 700 !important;">ID</th>
                        <th style="font-weight: 700 !important;">Worker</th>
                        <th style="font-weight: 700 !important;">Client</th>
                        <th style="font-weight: 700 !important;">Order Date</th>
                        <th style="font-weight: 700 !important;">Deadline</th>
                        <th style="font-weight: 700 !important;">Image</th>
                        <th style="font-weight: 700 !important;">Specification</th>
                        <th style="font-weight: 700 !important;">Status</th>
                        <th style="font-weight: 700 !important;">Price</th>
                        <th style="font-weight: 700 !important;">Action</th>
                    </thead>
                    <tbody>

                        @foreach ($AllOrder as $key => $Orders)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    @if ($Orders->worker_id == NULL)
                                        Custom User
                                    @else
                                     {{ $Orders->user->name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($Orders->client != NULL)
                                    {{ $Orders->client->name }}
                                    @else

                                    @endif
                                </td>
                                <td>{{ date('d M y', strtotime($Orders['order_date'])) }}</td>
                                <td>{{ date('d M y', strtotime($Orders['delivery_date'])) }}</td>
                                <td>
                                    @if ($Orders->orderImage->count() > 0)
                                        {{ $Orders->orderImage->count() }} Pcs
                                    @endif
                                </td>
                                <td>{{ $Orders->specification->name }}</td>
                                <td>
                                    @if ($Orders->status == 1)
                                        <span class="active_btn btn btn-sm rounded-0 shadow-sm">Active</span>
                                    @elseif($Orders->status == 2)
                                        <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #E9B0F0;">Pending</span>
                                    @elseif($Orders->status == 3)
                                        <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #F0EFB0;">Redo</span>
                                    @elseif($Orders->status == 4)
                                        <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #B0DAF0;">Completed</span>
                                    @elseif($Orders->status == 5)
                                        <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #F0B0B0;">Cencel</span>
                                    @endif
                                </td>
                                <td>${{ $Orders->price }}</td>
                                <td><a href="{{ route('admin.order.show',$Orders->id) }}" class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background: #19AAF8;">Track Order</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
