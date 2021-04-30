@extends('layouts.master')
@section('title', 'Order')
@push('styles')
<style>
    .download_button button {
        padding: 7px 31px;
        background-color: #19AAF8;
        border: 1px solid pink;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .download_button {
        padding-left: 20px;
    }

    .down-img {
        padding-bottom: 50px;
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-gap: 20px;
        justify-content: center;
        align-items: center;

    }

    .down-all {
        position: relative;
    }

    .down-img-overlay > a {
        padding: 5px 10px;
    }
    .down-img-overlay > span {
        padding: 5px;
    }
    .down-img-overlay {
        background: rgba(18, 84, 115, 0.82);
        width: 100%;
        display: flex;
        justify-content: space-between;
        color: #fff;
        position: absolute;
        bottom: 0;
        transition: 0.8s ease;
        opacity: 0;
    }

    .down-all:hover .down-img-overlay {
        opacity: 1;
    }

    /* .down-img-overlay img:hover{
  opacity:1;
} */
    .order-det {
        padding-left: 43px;
    }

    .upld-img-sec {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        width: 600px;
        border: 2px dashed black;
        background-color: #f5f7f8;
        margin-bottom: 20px;
    }

    .upld-frm {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .upld-top {
        display: flex;
        justify-content: center;
    }

    .upld-frm span {
        position: relative;
    }

    .upld-frm span button {
        padding: 6px 20px;
        color: #fff;
        background: #19aaf8;
        border: none;
        cursor: pointer;
    }

    .upld-frm span button:before {
        content: 'or';
        display: block;
        position: absolute;
        left: -39px;
        font-size: 30px;
        color: black;
        top: -7px;
    }

    .upload_files p {
        margin: 0 !important;
    }

    p.p-1 {
        margin-bottom: 0 !important;
    }

    .btn-upld {
        padding: 10px 20px;
        cursor: pointer;
        width: 200px;
        background: #19aaf8;
        color: #fff;
        border: none;
    }

    .uploaded_files {
        margin-bottom: 20vh;
    }
    .page-item.active .page-link {
        color: #ffffff;
        z-index: 1;
        background-color: #19AAF8 !important;
        border-color: #19AAF8 !important;
    }
    #order_details_spec li{
        float: left;
        margin-right: 30px;
        overflow: hidden;
    }
    #order_details_spec li::before {
        content: url(http://localhost/dclipping/public/assets/images/list_background_bullet.png);
        margin-right: 10px;
    }
    .down-all > img {
        width: 259px;
        height: 219px;
    }

    @media screen and (max-width:767px) {
        .down-img {
            grid-template-columns: repeat(1, 1fr);
        }

        .upld-frm span button:before {
            display: none;
        }

        .card-dash .card-dash {
            margin-bottom: 10px;
        }

        .form-control {
            width: 0 !important;
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
<section class="worker_orders mt-2">
    <div class="card border-0 p-3">
        <div class="card-title">
            <h3 class="m-0 py-3 text-font-family d-flex justify-content-between">My Order
                <a href="{{ route('client.order.index') }}" class="btn btn-sm rounded-0 shadow-sm px-3 text-light btn-bg-color"><i class="fa fa-backspace"></i> Back to list</a>
            </h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive ">
                    <table class="table table-bordered table-sm w-100" id="DataTable">
                        <thead>
                            <th style="font-weight: 700 !important;">Order ID</th>
                            <th style="font-weight: 700 !important;">Client ID</th>
                            <th style="font-weight: 700 !important;">Order Date</th>
                            <th style="font-weight: 700 !important;">Deadline</th>
                            <th style="font-weight: 700 !important;">Image</th>
                            <th style="font-weight: 700 !important;">Specification</th>
                            <th style="font-weight: 700 !important;">Status</th>
                            <th style="font-weight: 700 !important;">Amount</th>
                            <th style="font-weight: 700 !important;">Acction</th>
                        </thead>
                        <tbody>

                            @foreach ($Order as $orders)
                                <tr>
                                    <td>{{ $orders->order_id }}</td>
                                    <td>{{ $orders->client->user_id }}</td>
                                    <td>{{ date('d-M-Y', strtotime($orders['order_date'])) }}</td>
                                    <td>{{ date('d-M-Y', strtotime($orders['delivery_date'])) }}</td>
                                    <td>
                                        @if ($orders->orderImage->count() > 0)
                                            {{ $orders->orderImage->count() }} Pcs
                                        @endif
                                    </td>
                                    <td>{{ $orders->specification->name }}</td>
                                    <td>
                                        @if ($orders->status == 1)
                                            <span class="active_btn btn btn-sm rounded-0 shadow-sm">Active</span>
                                        @elseif($orders->status == 2)
                                            <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #E9B0F0;">Pending</span>
                                        @elseif($orders->status == 3)
                                            <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #F0EFB0;">Redo</span>
                                        @elseif($orders->status == 4)
                                            <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #B0DAF0;">Completed</span>
                                        @elseif($orders->status == 5)
                                            <span class="active_btn btn btn-sm rounded-0 shadow-sm" style="background: #F0B0B0;">Cencel</span>
                                        @endif
                                    </td>
                                    <td>${{ $orders->price }}</td>
                                    <td>
                                        <a href="{{ route('client.order.show',$orders->id) }}" data-toggle="tooltip" data-placement="top" title="Details Order" class="btn btn-sm shadow-sm text-light rounded-0" style="background: #19AAF8;">Track Order</a>
                                        @if ($orders->status == 4)
                                            <a href="{{ route('client.invoice.print',$orders->id) }}" target="_blank" data-toggle="tooltip" data-placement="top" title="Invoice Print" class="btn btn-sm shadow-sm text-light rounded-0 btn-success"><i class="fas fa-print"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            {{ $Order->links() }}
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="py-3 bg-white mt-3">
                <h3 class="m-0 pl-3">Order Details</h3>
            </div>
        </div>
    </div>

    <div class="bg-white mt-3">
        <div class="row p-4">
            <div class="col-md-12">
                <div class="pro_details">
                    <ul id="order_details_spec" class="list-unstyled">

                        {{-- Specification Addon  --}}
                        @foreach ($OrderDetails->specification->addon as $Addons)
                        <li><span>{{ $Addons->name }}</span></li>
                        @endforeach
                        {{-- Specification Size  --}}
                        @if ($OrderDetails->specification->custom_size)
                        <li><span>{{ $OrderDetails->specification->custom_size->value_1 }} : {{ $OrderDetails->specification->custom_size->value_2 }}</span></li>
                        @endif
                        @foreach ($OrderDetails->specification->size as $Sizes)
                        <li><span>{{ $Sizes->name }}</span></li>
                        @endforeach
                        {{-- Specification Background  --}}
                        @foreach ($OrderDetails->specification->background as $Backgrounds)
                        <li><span>{{ $Backgrounds->name }}</span></li>
                        @endforeach
                        {{-- Specification File_Type  --}}
                        @foreach ($OrderDetails->specification->file_type as $File_Type)
                        <li><span>{{ $File_Type->name }}</span></li>
                        @endforeach
                        {{-- Specification Alignment  --}}
                        @foreach ($OrderDetails->specification->alignment as $Alignment)
                        <li><span>{{ $Alignment->name }}</span></li>
                        @endforeach
                        {{-- Specification Color  --}}
                        @foreach ($OrderDetails->specification->color as $Colors)
                        <li><span>{{ $Colors->name }}</span></li>
                        @endforeach
                        {{-- Specification Dpi  --}}
                        @foreach ($OrderDetails->specification->dpi as $Dpis)
                        <li><span>{{ $Dpis->name }}</span></li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        <div class="row py-3">

            @foreach ($OrderDetails->orderImage as $images)
                <div class="col-xl-2 col-sm-4 col-6">
                    <div class="down-all">
                        <img src="{{ asset('public/assets/images/order_image/'.$images->image) }}" alt="" style="width: 100%; height: 219px;">
                        <div class="down-img-overlay">
                            <span>image.jpg</span>
                            <a href="{{ asset('public/assets/images/order_image/'.$images->image) }}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>  
    </div>

    @if ($OrderDetails->status == 4 && $OrderDetails->orderImage->count() >= $OrderDetails->deliveryImage->count())
        <div class="row">
            <div class="col-12">
                <div class="py-3 bg-white mt-3">
                    <h3 class="m-0 pl-3">Delivery Image
                        <a href="{{ route('client.order.image.download', $OrderDetails->id) }}" class="btn btn-sm rounded-0 shadow-sm btn-bg-color text-light font-weight-bold ml-5">Download All</a>
                    </h3>
                </div>
            </div>
        </div>

        <div class="bg-white mt-3">

            <div class="row py-3">

                @foreach ($OrderDetails->deliveryImage as $images)
                    <div class="col-xl-2 col-sm-4 col-6">
                        <div class="down-all">
                            <img src="{{ asset('public/assets/orderunzip/'.$OrderDetails->order_id.'/'.$images->delivery_image) }}" alt="" style="width: 100%; height: 219px;">
                            <div class="down-img-overlay">
                                <span>{{ $images->delivery_image }}</span>
                                <a href="{{ asset('public/assets/orderunzip/'.$OrderDetails->order_id.'/'.$images->delivery_image) }}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>  
        </div>
    @else
        
    @endif


</section>
@endsection
