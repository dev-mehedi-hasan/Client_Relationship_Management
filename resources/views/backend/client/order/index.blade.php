@extends('layouts.master')
@section('title', 'order')
@push('styles')
<style>
    .all-order {
        background: #fff;
        margin: 35px;
        padding: 20px;
    }

    .order-btn {
        display: flex;
        width: 185px;
        height: 42px;
        background: #19aaf8;
        color: #fff;
        margin-left: 86px;
        margin-top: 9px;
        cursor: pointer;
        border: none;
        justify-content: center;
        align-items: center;
    }

    .order-btn:hover {
        color: #fff;
    }

    .in_progress {
        height: 40px;
        background-color: #fff;
    }

    .in_progress_bar {
        width: 70%;
        height: 100px;
    }

    .form-control:focus {
        box-shadow: none;
    }

    .form-control-underlined {
        border-width: 0;
        border-bottom-width: 1px;
        border-radius: 0;
        padding-left: 0;
    }

    .form-control::placeholder {
        font-size: 0.95rem;
        color: #aaa;
        font-style: italic;
    }

    .track_order {
        color: #fff;
    }

    .all_card_title {
        font-size: 25px;
        margin-right: 36px;
    }

    .invoice_btn {
        background-color: #19AAF8;
        color: #fff;
    }

    .list_image {
        list-style-image:url('{{asset('public/assets/images/list_background_bullet.png')}}');
        text-align: left;
        line-height: 50px;
        cursor: pointer;
    }

    .take_it_btn {
        color: #fff;
        background-color: #19AAF8;
    }

    #order_details_spec li {
        list-style-image:url('{{asset('public/assets/images/list_background_bullet.png')}}');
        float: left;
        padding: 5px 10px;
    }

    #order_details_spec li span {
        padding-right: 50px;
    }

    .product_image_complete img {
        width: 100%;
    }

    .justify div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-crm {
        background-color: #19AAF8;
        padding: 2px 5px;
        color: #fff;

    }

    .hide_opacity {
        opacity: 0;
    }

    .simple_btn {
        border: 1px solid #ddd;
        padding: 4px 6px;
    }

    .price_bold {
        font-size: 40px;
        font-weight: 900;
        color: #000;
    }

    .track-btn {
        color: #fff;
        padding: 4px 35px;
        background: #19aaf8;
    }

    .upload_img_ {
        padding: 10px 20px;
        border: 1px solid #ddd;
        background-color: #19AAF8;
        color: #fff;
        cursor: pointer;
    }
    .page-item.active .page-link {
        background-color: #19AAF8 !important;
        border-color: #19AAF8 !important;
    }
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
            <h3 class="d-flex justify-content-between py-3 m-0 font-weight-bold">Orders
                <a href="{{ route('client.order.create') }}" class="btn btn-sm rounded-0 text-light px-3 shadow-sm" style="background-color: #19AAF8"><i class="fa fa-plus fa-sm"></i> Add New Order</a>
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
                        <th style="font-weight: 700 !important;">Specification</th>
                        <th style="font-weight: 700 !important;">Status</th>
                        <th style="font-weight: 700 !important;">Price</th>
                        <th style="font-weight: 700 !important;">Action</th>
                    </thead>
                    <tbody>

                        @foreach ($Order as $key => $Orders)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $Orders->order_id }}</td>
                                <td>{{ date('d-M-Y', strtotime($Orders['order_date'])) }}</td>
                                <td>{{ date('d-M-Y', strtotime($Orders['delivery_date'])) }}</td>
                                <td>
                                    @if ($Orders->orderImage->count() > 0)
                                        {{ $Orders->orderImage->count() }} Pcs
                                    @endif
                                </td>
                                <td>{{ $Orders->specification->name }}</td>
                                <td>

                                    @if ($Orders->status == 1)
                                        <span class="active_btn btn-sm rounded-0 shadow-sm">Active</span>
                                    @elseif($Orders->status == 2)
                                        <span class="active_btn btn-sm rounded-0 shadow-sm" style="background: #E9B0F0;">Pending</span>
                                    @elseif($Orders->status == 3)
                                        <span class="active_btn btn-sm rounded-0 shadow-sm" style="background: #F0EFB0;">Redo</span>
                                    @elseif($Orders->status == 4)
                                        <span class="active_btn btn-sm rounded-0 shadow-sm" style="background: #B0DAF0;">Completed</span>
                                    @elseif($Orders->status == 5)
                                        <span class="active_btn btn-sm rounded-0 shadow-sm" style="background: #F0B0B0;">Cencel</span>
                                    @endif

                                </td>
                                <td>${{ $Orders->price }}</td>
                                <td>
                                    <a class="btn btn-sm rounded-0 shadow-sm text-light px-3" style="background-color: #19AAF8" href="{{ route('client.order.show',$Orders->id) }}">Track Order</a>
                                    @if ($Orders->status == 4)
                                        <a href="{{ route('client.invoice.print',$Orders->id) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Invoice Print" class="btn btn-sm shadow-sm text-light rounded-0 btn-success"><i class="fas fa-print"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
