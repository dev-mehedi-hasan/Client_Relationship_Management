@extends('layouts.master')
@section('title', 'Dashboard')
@push('styles')
<style>
    .card_head h1 {
        font-size: 37px;
        color: #fff;
        margin-bottom: 36px;
    }

    .take_it_btn {
        padding: 4px 35px;
        color: #fff;
        background-color: #19AAF8;
    }

    .card-dash {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: none !important;
    }

    .total_card {
        margin-bottom: 0;
        font-size: 21px;
        font-weight: 600;
        color: #000;
    }

    .card-body-dash-dash-dash-dash {
        padding: none !important;
    }

    .count {
        font-size: 37px;
        font-weight: 500;
        color: #19AAF8;
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
            <h3 class="d-flex justify-content-between py-3 text-font-family m-0">Dashboard</h3>
        </div>
    </div>

    <div class="row mt-2 mx-1 py-5 mb-2 shadow-sm bg-white">
        <div class="col-xl-6 col-sm-12 col-12">

            <div style="background: #19AAF8;">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center py-2" style="border-bottom: 1px solid rgb(230, 230, 230); ">
                            <h2 class="text-white d-block text-font-family m-0">Total Order</h2>
                        </div>
                    </div>
                </div>

                <div class="row px-3 py-4">
                    <div class="col-xl-4 col-sm-6 col-12 mb-2">
                        <div class="bg-white shadow-sm">
                            <div class="text-center py-3">
                                <span class="text-font-family" style="font-size: 20px;">Orders</span>
                                <h2 class="text-font-family mt-2" style="font-weight: 600; ">{{ $totalOrder->count() }}</h2>
                            </div>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar w-100" role="progressbar" style="background: #B0F0B2;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12 mb-2">
                        <div class="bg-white shadow-sm">
                            <div class="text-center py-3">
                                <span class="text-font-family" style="font-size: 20px;">Complete</span>
                                <h2 class="text-font-family mt-2" style="font-weight: 600; ">{{ $completeOrder->count() }}</h2>
                            </div>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar w-
                                @if ($completeOrder->count() > 0)
                                    {{ ($totalOrder->count()-$completeOrder->count())*100/$totalOrder->count() }}
                                @else
                                    0
                                @endif" role="progressbar" style="background: #B0F0B2;" aria-valuenow="
                                @if ($completeOrder->count() > 0)
                                    {{ ($totalOrder->count()-$completeOrder->count())*100/$totalOrder->count() }}
                                @else
                                    0
                                @endif
                                " aria-valuemin="0" aria-valuemax="
                                @if ($completeOrder->count() > 0)
                                    {{ ($totalOrder->count()-$completeOrder->count())*100/$totalOrder->count() }}
                                @else
                                    0
                                @endif
                                "></div>
                              </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12 mb-2">
                        <div class="bg-white  shadow-sm">
                            <div class="text-center py-3">
                                <span class="text-font-family" style="font-size: 20px;">Pending</span>
                                <h2 class="text-font-family mt-2" style="font-weight: 600; ">{{ $pendingOrder->count() }}</h2>
                            </div>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar w-
                                @if ($pendingOrder->count() > 0)
                                {{ ($pendingOrder->count()*100)/$totalOrder->count() }}
                                @else
                                    0
                                @endif
                                " role="progressbar" style="background: #B0F0B2;" aria-valuenow="@if ($pendingOrder->count() > 0)
                                {{ ($pendingOrder->count()*100)/$totalOrder->count() }}
                                @else
                                    0
                                @endif" aria-valuemin="0" aria-valuemax=""></div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="col-xl-6 col-sm-12 col-12 mt-2 mt-sm-0">

            <div style="background: #19AAF8;">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center py-2" style="border-bottom: 1px solid rgb(230, 230, 230); ">
                            <h2 class="text-white d-block text-font-family m-0">Total Payment</h2>
                        </div>
                    </div>
                </div>

                <div class="row px-3 py-4">
                    <div class="col-xl-4 col-sm-6 col-12 mb-2">
                        <div class="bg-white shadow-sm">
                            <div class="text-center py-3">
                                <span class="text-font-family" style="font-size: 20px;">Total</span>
                                <h2 class="text-font-family mt-2" style="font-weight: 600; ">${{ $totalOrder->sum('price') }}</h2>
                            </div>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12 mb-2">
                        <div class="bg-white shadow-sm">
                            <div class="text-center py-3">
                                <span class="text-font-family" style="font-size: 20px;">Complete</span>
                                <h2 class="text-font-family mt-2" style="font-weight: 600; ">${{ $completeOrder->sum('price') }}</h2>
                            </div>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-12 mb-2">
                        <div class="bg-white  shadow-sm">
                            <div class="text-center py-3">
                                <span class="text-font-family" style="font-size: 20px;">Pendign</span>
                                <h2 class="text-font-family mt-2" style="font-weight: 600; ">${{ $pendingOrder->sum('price') }}</h2>
                            </div>
                            <div class="progress rounded-0" style="height: 8px;">
                                <div class="progress-bar w-75" role="progressbar" style="width: 25%; background: #B0F0B2;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row shadow-sm bg-white mx-1">
        <div class="col-12">
            <h3 class="d-flex justify-content-between py-3 m-0">Available Orders</h3>
        </div>
    </div>

    <div class="row bg-white mt-2 mx-1 p-4">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped w-100" id="DataTable">
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
                        @foreach ($Orders as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ date('d-m-Y', strtotime($order['order_date'])) }}</td>
                            <td>{{ date('d-m-Y', strtotime($order['delivery_date'])) }}</td>
                            <td>
                                @if ($order->orderImage->count() > 0)
                                    {{ $order->orderImage->count() }} Pcs
                                @endif
                            </td>
                            <td>{{ $order->specification->name }}</td>
                            <td>
                                @if ($order->status == 1)
                                <span class="active_btn btn btn-sm rounded-0 shadow-sm">Active</span>
                                @elseif($order->status == 2)
                                <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #E9B0F0;">Pending</span>
                                @elseif($order->status == 3)
                                <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #F0EFB0;">Redo</span>
                                @elseif($order->status == 4)
                                <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #B0DAF0;">Completed</span>
                                @elseif($order->status == 5)
                                <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #F0B0B0;">Cencel</span>
                                @endif
                            </td>
                            <td>${{ $order->price }}</td>
                            <td>
                                <a href="{{ route('worker.order.take.it',$order->id) }}"
                                    class="btn btn-sm shadow-sm rounded-0 px-4 text-light" style="background: #19AAF8;">Take
                                    it</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


