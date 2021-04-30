@extends('layouts.master')
@section('title', 'Order')
@push('styles')
<link href="{{ asset('public/assets/css/image-uploader.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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

    .down-img-overlay>a {
        padding: 5px 10px;
    }

    .down-img-overlay>span {
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

    #order_details_spec li {
        float: left;
        margin-right: 30px;
        overflow: hidden;
    }

    #order_details_spec li::before {
        content: url(http://localhost/dclipping/public/assets/images/list_background_bullet.png);
        margin-right: 10px;
    }

    .down-all>img {
        width: 259px;
        height: 219px;
    }
    .custom-file .some{
        display: none !important;
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
<section class="worker_orders mt-3">

    @if(session()->has('orderImage'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Warring!</strong> {{ session('orderImage') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('deliveryField'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ session('deliveryField') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @error('zip_file')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Warring!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror

    @error('photos')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Warring!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror

    <div class="card border-0 p-3">
        <div class="card-title">
            <h3 class="m-0">My Orders
            </h3>
        </div>
        <div class="table-responsive ">
            <table class="table table-bordered table-sm w-100">
                <thead>
                    <th style="font-weight: 700 !important;">Order ID</th>
                    <th style="font-weight: 700 !important;">Client ID</th>
                    <th style="font-weight: 700 !important;">Order Date</th>
                    <th style="font-weight: 700 !important;">Deadline</th>
                    <th style="font-weight: 700 !important;">Image</th>
                    <th style="font-weight: 700 !important;">Specification</th>
                    <th style="font-weight: 700 !important;">Status</th>
                    <th style="font-weight: 700 !important;">Amount</th>
                    <th style="font-weight: 700 !important;">Account</th>
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
                            @if ($orders->status == 4)
                            <a href="{{ route('worker.order.show',$orders->id) }}" data-toggle="tooltip" data-placement="top" title="Order Details" class="btn btn-sm shadow-sm text-light btn-info"><i class="far fa-eye"></i></a>
                            @else
                            <a href="{{ route('worker.order.show',$orders->id) }}" data-toggle="tooltip" data-placement="top" title="Delivery Order" class="btn btn-sm shadow-sm text-light"
                                style="background: #19AAF8;"><i class="fas fa-shipping-fast"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end">
            {{ $Order->links() }}
        </div>

    </div>

    <div class="card mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="m-0 py-4 d-flex justify-content-between">Order Details
                                    <span>0/{{ $OrderDetails->orderImage->count() }} </span>
                        </h3>
                    </div>
                    <div class="pro_details">
                        <ul id="order_details_spec" class="list-unstyled">

                            {{-- Specification Addon  --}}
                            @foreach ($OrderDetails->specification->addon as $Addons)
                            <li><span>{{ $Addons->name }}</span></li>
                            @endforeach
                            {{-- Specification Size  --}}
                            @if ($OrderDetails->specification->custom_size)
                            <li><span>{{ $OrderDetails->specification->custom_size->value_1 }} :
                                    {{ $OrderDetails->specification->custom_size->value_2 }}</span></li>
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
                <div class="pl-3 my-4">
                        <a href="{{ route('worker.order.image.download',$OrderDetails->id) }}" class="btn btn-md shadow-sm text-light rounded-0" style="background: #19AAF8;"><i class="fa fa-download" aria-hidden="true"></i> Download All </a>
                </div>
            </div>

            <div class="row my-3">

                @foreach ($OrderDetails->orderImage as $images)
                <div class="col-xl-2 col-sm-4 col-6 mb-1">
                    <div class="down-all">
                        <img src="{{ asset('public/assets/images/order_image/'.$images->image) }}" alt=""
                        style="width: 100%; height: 219px;">
                        <div class="down-img-overlay">
                            <span>{{ $images->image }}</span>
                            <a href="{{ asset('public/assets/images/order_image/'.$images->image) }}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    @php
        $DeliveryImageCount = App\Models\DeliveryImage::where('order_id', $OrderDetails->id)->count();
    @endphp

    @if ($DeliveryImageCount > 0)
    <div class="card mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="m-0 py-4 d-flex justify-content-between">Delivery image
                            @if ($orders->orderImage->count() > 0)
                                <span>{{ $DeliveryImageCount }}/{{ $OrderDetails->orderImage->count() }} </span>
                            @endif
                    </h3>
                </div>
            </div>

            <div class="row my-3">
                @foreach ($DeliveryImage as $DeliveryImages)
                <div class="col-xl-2 col-sm-4 col-6 mb-1">
                    <div class="down-all">
                        <img src="{{ asset('public/assets/orderunzip/'.$OrderDetails->order_id                   .'/'.$DeliveryImages->delivery_image) }}" alt=""
                            style="width: 219px; height: 219px;">
                        <div class="down-img-overlay">
                            <span>{{ $DeliveryImages->delivery_image }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else

    @endif

        @if ($OrderDetails->orderImage->count() > $DeliveryImageCount)
            <div class="card mt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="m-0 py-4">Order Completion</h3>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-12">
                            <form action="{{ route('worker.order.delivery.image',$OrderDetails->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-xl-5 col-sm-12 col-12">
                                        <div class="input-field">
                                            <div class="input-images-2"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-sm-12 col-12 d-flex align-items-center justify-content-center">
                                        <h4>
                                            OR
                                        </h4>
                                    </div>
                                    <div class="form-group col-xl-5 col-sm-12 col-12 d-flex align-items-center">
                                        <div class="custom-file d-none">
                                            <input type="files" name="zip_files" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label rounded-0" for="customFile">Choose Zip file</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mt-4 d-flex justify-content-center">
                                    <button class="btn btn-md shadow-sm rounded-0 text-light px-4"
                                        style="background: #19AAF8;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else

        @endif

</section>
@endsection
@push('scripts')
<script src="{{ asset('public/assets/js/image-uploader.js') }}"></script>
<script>

    // multiple image upload
    $('.input-images-2').imageUploader({
        imagesInputName: 'photos',
    });

    // image upload condition
    const image = document.querySelector('#customFile');
    image.addEventListener('input', () => {
        console.log('file is hello')
    });

    const imageee = document.querySelector('.image-uploader');
    let fieldnone = false;

    console.log(imageee);
    imageee.addEventListener('input', () => {
        fieldnone = true;
        if(fieldnone){
            image.classList.add('same')
            console.log(image.classList)
        }
        console.log('file is uploaded')
    });

</script>

@endpush

