@extends('layouts.master')
@section('title', 'Dashboard')
@push('styles')
<style>
    .client_btn_sec {
        display: flex;
    }

    .client_contact-us {
        width: 142px;
        margin-left: 10px;
        height: 41px;
        margin: 0 auto;
        text-align: center;
        padding: 10px 7px;
        font-size: 14px;
        text-decoration: none;
        color: #fff;
        background-color: #19AAF8;
    }

    .order_now_btn {
        padding: 10px 50px;
        background: #fff;
    }

    .track-btn {
        color: #fff;
        padding: 4px 35px;
        background: #19aaf8;
    }

    .feedback-btn {
        margin: 0 auto;
        width: 186px;
        text-align: center;
        padding: 10px 7px;
        font-size: 14px;
        text-decoration: none;
        color: #fff;
        background-color: #19AAF8;
        height: 44px;
    }

    .table td, .table th {
        vertical-align: middle !important;
    }
    .page-item.active .page-link {
        color: #ffffff;
        z-index: 1;
        background-color: #19AAF8 !important;
        border-color: #19AAF8 !important;
    }
    .pagination{
        margin: 0;
    }
    @media screen and (max-width: 767px) {
        .client_btn_sec {
            /* display:flex; */
            flex-direction: column;
        }

        .client_contact-us {
            margin-bottom: 10px
        }

        .free_trial {
            height: auto !important;
            margin: 10px auto !important;
        }

        .track-btn {
            padding: 4px 9px;
        }
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

<div class="row shadow-sm bg-white mt-2" style="margin: 0 2px;">
    <div class="col-12">
        <h3 class="m-0 py-3">Welcome To: <strong>{{ Auth::user()->name }}</strong></h3>
    </div>
</div>

<section class="client_dashboard bg-white">

    <div class="row mt-3">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="bg-white shadow p-4">
                <div class="text-center">
                    <h3 class="text-left">Requires? (Bulk Images)</h3>
                    <p class="mt-3 font-weight-600 text-left" style="color: #000000; font-weight: 500; font-size: 16px;">If you need help or have any questions, feel free to contact us! Make sure to contact us for a custom price setting when you are planning  to upload large volumes.</p>
                    <div class="d-flex justify-content-center mt-4 mb-4">
                        <a class="btn btn-md shadow rounded-0 text-light px-4 mr-3" style="background: #19AAF8;" href="{{ route('client.contacts-us.index') }}"> Contact Us</a>
                        <a href="" class="btn btn-md shadow rounded-0 text-light px-4" style="background: #19AAF8;">View Help Page</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="shadow p-4" style="background: #19AAF8; height: 270px;">
                <div class="text-left">
                    <h3 class="text-light">Free Trial</h3>
                    <p style="color:#fff;">You have 20 free trial images left! (Cannot be used on
                        pets, selfies or landscapes)</p>
                    <div class="text-center mt-5">
                        <a href="{{ route('client.freetrail.index') }}" class="btn btn-md shadow-sm rounded-0 px-5 bg-white" > Order Now</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="bg-white shadow p-4">
                <div class="text-center " >
                    <h3 class="text-left">Feedback</h3>
                    <p class="m-0 font-weight-600 text-left" style="color: #000000; font-weight: 500; font-size: 16px;">You have 20 free trial images left! (Cannot be used on pets, selfies or landscapes)</p>
                    <div class="d-flex justify-content-center mb-4" style="margin-top: 50px;">
                        <a href="{{ route('client.order.feedback') }}" class="btn btn-md shadow rounded-0 text-light px-4 mr-3" style="background: #19AAF8;"> Give feedback</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 mx-3 shadow-sm">
        <div class="col-xl-8 col-12" style="">
            <div>
                <canvas id="myChart" style="width: 100%; min-height: 300px;"></canvas>
            </div>
        </div>
        <div class="col-xl-4 col-12 d-flex justify-content-center align-items-center">
            <div class="ads_from">
                <h1 class="m-0">image hobe</h1>
            </div>
        </div>
    </div>
</section>

<div class="shadow-sm p-4 mt-3 bg-white">
    <div class="row">
        <div class="all_card_title"><h3 class="m-0">Recent Orders</h3></div>
        <div class="table-responsive pt-4 ">
            <table class="table table-bordered table-sm w-100">
                <thead>
                    <th style="font-weight: 700 !important;">Client ID</th>
                    <th style="font-weight: 700 !important;">Order ID</th>
                    <th style="font-weight: 700 !important;">Order Date</th>
                    <th style="font-weight: 700 !important;">Deadline</th>
                    <th style="font-weight: 700 !important;">Image</th>
                    <th style="font-weight: 700 !important;">Specification</th>
                    <th style="font-weight: 700 !important;">Price</th>
                    <th style="font-weight: 700 !important;">Status</th>
                    <th style="font-weight: 700 !important;">Action</th>
                </thead>
                <tbody>
                    @foreach ($RecentOrder as $recentOrders)
                        <tr>
                            <td>{{ $recentOrders->client->user_id }}</td>
                            <td>{{ $recentOrders->order_id }}</td>
                            <td>{{ date('d-M-Y', strtotime($recentOrders['order_date'])) }}</td>
                            <td>{{ date('d-M-Y', strtotime($recentOrders['delivery_date'])) }}</td>
                            <td>
                                @if ($recentOrders->orderImage->count() > 0)
                                    {{ $recentOrders->orderImage->count() }} Pcs
                                @endif
                            </td>
                            <td>{{ $recentOrders->specification->name }}</td>
                            <td>${{ $recentOrders->price }}</td>
                            <td>
                                @if ($recentOrders->status == 1)
                                    <span class="active_btn btn btn-sm rounded-0 shadow-sm">Active</span>
                                @elseif($recentOrders->status == 2)
                                    <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #E9B0F0;">Pending</span>
                                @elseif($recentOrders->status == 3)
                                    <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #F0EFB0;">Redo</span>
                                @elseif($recentOrders->status == 4)
                                    <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #B0DAF0;">Completed</span>
                                @elseif($recentOrders->status == 5)
                                    <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #F0B0B0;">Cencel</span>
                                @endif
                            </td>

                            <td><a class="btn btn-sm rounded-0 shadow-sm px-3 text-light" style="background: #19AAF8;" href="{{ route('client.order.show',$recentOrders->id) }}">Track Order</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
    <div class="d-flex justify-content-end">
        {{ $RecentOrder->links() }}
    </div>
</div>
@endsection



