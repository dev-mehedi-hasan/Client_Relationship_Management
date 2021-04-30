@extends('layouts.master')
@section('title', 'Order')
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')

<style>
    .spec-header {
        display: inline-flex;
        flex-wrap: wrap;
        gap: 35px;
    }

    .spec-btn>button {
        background: #19aaf8;
        padding: 5px;
        width: 155px;
        font-size: 16px;
        border: none;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
    }

    .price_bold {
        font-size: 40px;
        font-weight: 900;
        color: #000;
        margin-bottom: 0;
    }

    .price_bold span {
        font-size: 15px;
    }

    .borders {
        border-bottom: 2px solid #cccccc;
    }
    nav > ul.pagination{
        margin: 0;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #19AAF8;
        border-color: #19AAF8;
    }
</style>

    <div class="row shadow-sm">
        <div class="col-12">
            <div class="py-3 px-3 bg-white mt-2">
                <h3 class="m-0 d-flex justify-content-between font-weight-bold">Specification
                    <a href="{{ route('client.specification.create') }}" class="btn btn-sm rounded-0 shadow-sm text-light"
                style="background: #19AAF8;"><i class="fas fa-plus fa-sm"></i>
                Add New</a>
                </h3>
            </div>
        </div>
    </div>


    @foreach ($Specification as $Specifications)

         {{-- Specification Item Price Calculation --}}
     @php
        $bg_price = 0;
        $file_price = 0;
        $align_price = 0;
        $color_price = 0;
        $dpi_price = 0;
        $addon_price = 0;
        $size_price = 0;
    @endphp
    @foreach ($Specifications->background as $backgrounds)
        @php
            $bg_price = $bg_price + $backgrounds->price;
        @endphp
    @endforeach
    @foreach ($Specifications->file_type as $file_types)
        @php
            $file_price = $file_price + $file_types->price;
        @endphp
    @endforeach
    @foreach ($Specifications->alignment as $alignments)
        @php
            $align_price = $align_price + $alignments->price;
        @endphp
    @endforeach
    @foreach ($Specifications->color as $colors)
        @php
            $color_price = $color_price + $colors->price;
        @endphp
    @endforeach
    @foreach ($Specifications->dpi as $dpis)
        @php
            $dpi_price = $dpi_price + $dpis->price;
        @endphp
    @endforeach
    @foreach ($Specifications->addon as $addons)
        @php
            $addon_price = $addon_price + $addons->price;
        @endphp
    @endforeach
    @foreach ($Specifications->size as $sizes)
        @php
            $size_price = $size_price + $sizes->price;
        @endphp
    @endforeach

    <div class="bg-white mt-3 shadow-sm">
        <div class="row py-3 pl-4">
            <div class="col-12">
                <h4 class="m-0">{{ $Specifications->specific_id }}</h4>
            </div>
        </div>

        <div class="row pl-4 pb-5 mx-1 borders">
            <div class="col-md-2">
                <li class="list_image">{{ $Specifications->category->title }}</li>
                <a href="{{ route('client.specification-stepbystep.show',$Specifications->id) }}" class="btn ml-3 btn-sm rounded-0 shadow-sm text-light" style="background: #19AAF8;"><i class="fas fa-eye"></i> View</a>
            </div>
            <div class="col-md-3">
                @if ($Specifications->custom_size)
                    <li class="list_image">{{ $Specifications->custom_size->value_1 }} : {{ $Specifications->custom_size->value_2 }}</li>
                @endif
                @foreach ($Specifications->size as $items)
                    <li class="list_image">{{ $items->name }}</li>
                @endforeach
                {{-- <a href="" class="btn btn-sm rounded-0 shadow-sm text-light" style="background: #19AAF8;"><i class="fas fa-edit"></i> Edit Specification</a> --}}
            </div>
            <div class="col-md-4">
                @foreach ($Specifications->addon as $items)
                    <li class="list_image">{{ $items->name }}</li>
                @endforeach
                {{-- <a href="" class="btn btn-sm rounded-0 shadow-sm text-light" style="background: #19AAF8;"><i class="fa fa-sticky-note" aria-hidden="true"></i> Note</a> --}}
            </div>
            <div class="col-md-3">
                <div class="">
                    <a href="{{ route('client.order.create') }}" class="btn btn-sm rounded-0 text-light shadow-sm" style="background: #19AAF8;">Order Now</a>
                    <p class="font-weight-bold text-dark m-0" style="font-size: 28px;">${{ $bg_price + $file_price + $align_price + $color_price + $dpi_price + $addon_price + $size_price }}</p>
                    <span>Per Image</span>
                </div>
            </div>
        </div>
    </div>


    @endforeach


<section>
    <div class="py-3 shadow-sm mt-2 d-flex justify-content-end" style="background: #ffffff;">
            {{ $Specification->links() }}
    </div>
</section>



@endsection
