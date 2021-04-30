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

    <div class="row shadow-sm bg-white mx-1 mt-2">
        <div class="col-12">
            <h3 class="m-0 py-3 text-font-family">Order Details</h3>
        </div>
    </div>

    <div class="bg-white">
        <div class="row mx-1 mt-2 py-3">
            <div class="col-12">
                <div class="mb-3">
                    <h4>Specification</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <th>Title</th>
                            <th>Category</th>
                            <th>File Type</th>
                            <th>Background</th>
                            <th>Alignment</th>
                            <th>Color</th>
                            <th>Margin</th>
                            <th>DPI</th>
                            <th>Format</th>
                            <th>Addon</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $OrderDetails->specification->name }}</td>
                                <td>{{ $OrderDetails->specification->category->title }}</td>
                                <td>
                                    @foreach ($OrderDetails->specification->file_type as $File_Type)
                                        <li class="list-unstyled"><span>{{ $File_Type->name }}</span></li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($OrderDetails->specification->background as $Backgrounds)
                                        <li class="list-unstyled"><span>{{ $Backgrounds->name }}</span></li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($OrderDetails->specification->alignment as $Alignments)
                                        <li class="list-unstyled"><span>{{ $Alignments->name }}</span></li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($OrderDetails->specification->color as $Colors)
                                        <li class="list-unstyled"><span>{{ $Colors->name }}</span></li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($OrderDetails->specification->margin as $Margins)
                                        <li class="list-unstyled"><span>{{ $Margins->margin }}</span></li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($OrderDetails->specification->dpi as $DPI)
                                        <li class="list-unstyled"><span>{{ $DPI->name }}</span></li>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($OrderDetails->specification->custom_size)
                                        <li class="list-unstyled"><strong>Custom:</strong> <span>{{ $OrderDetails->specification->custom_size->value_1 }} :
                                            {{ $OrderDetails->specification->custom_size->value_2 }}</span></li>
                                    @endif
                                    @foreach ($OrderDetails->specification->size as $Sizes)
                                        <li class="list-unstyled"><span>{{ $Sizes->name }}</span></li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($OrderDetails->specification->addon as $Addons)
                                        <li class="list-unstyled"><span>{{ $Addons->name }}</span></li>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- client order --}}
        <div class="row mx-1 mt-2 py-3">
            <div class="col-12">
                <div class="mt-3">
                    <h4>Order Image</h4>
                </div>
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

        {{-- Delivery Image --}}
        @php
            $DeliveryImageCount = App\Models\DeliveryImage::where('order_id', $OrderDetails->id)->count();
        @endphp

        <div class="row mx-1 mt-2 py-3">
            <div class="col-12">
                <div class="mt-3">
                    <h4>Delivery Image</h4>
                </div>
            </div>
        </div>

        @if ($DeliveryImageCount > 0)
            <div class="row my-3">
                @foreach ($DeliveryImage as $DeliveryImages)
                <div class="col-xl-2 col-sm-4 col-6 mb-1">
                    <div class="down-all">
                        <img src="{{ asset('public/assets/orderunzip/'.$OrderDetails->order_id.'/'.$DeliveryImages->delivery_image) }}" alt=""
                        style="width: 100%; height: 219px;">
                        <div class="down-img-overlay">
                            <span>{{ $DeliveryImages->delivery_image }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else

        @endif

    </div>


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

