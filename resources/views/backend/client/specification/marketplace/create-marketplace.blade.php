@extends('layouts.master')
@section('title', 'Select Specification')
@push('styles')
<style>
    .col-width-8{
        width: 12.5%;
        padding: 0 15px;
    }
    .pagination {
        float: right;
        margin: 0;
    }
    .page-item.active .page-link {
        background-color: #19AAF8;
        border-color: #19AAF8;
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
<section class="user_marketplace">

    @foreach ($Specification as $specifications)
    <div class="marketplace_list card p-4 mt-2" style="border-bottom:4px solid #ddd;">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="marketplace_logo">
                    <h4 class="m-0 d-flex justify-content-start">{{ $specifications->name }}
                        <a href="{{ route('client.specification-marketplace.show',$specifications->id) }}" class="ml-3 btn btn-sm rounded-0 shadow-sm text-light" style="background: #19AAF8;"><i
                            class="fas fa-eye"></i> View</a>
                    </h4>
                </div>
            </div>
        </div>

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
        @foreach ($specifications->background as $backgrounds)
            @php
                $bg_price = $bg_price + $backgrounds->price;
            @endphp
        @endforeach
        @foreach ($specifications->file_type as $file_types)
            @php
                $file_price = $file_price + $file_types->price;
            @endphp
        @endforeach
        @foreach ($specifications->alignment as $alignments)
            @php
                $align_price = $align_price + $alignments->price;
            @endphp
        @endforeach
        @foreach ($specifications->color as $colors)
            @php
                $color_price = $color_price + $colors->price;
            @endphp
        @endforeach
        @foreach ($specifications->dpi as $dpis)
            @php
                $dpi_price = $dpi_price + $dpis->price;
            @endphp
        @endforeach
        @foreach ($specifications->addon as $addons)
            @php
                $addon_price = $addon_price + $addons->price;
            @endphp
        @endforeach
        @foreach ($specifications->size as $sizes)
            @php
                $size_price = $size_price + $sizes->price;
            @endphp
        @endforeach

        <div class="row pl-4 pb-5 mt-3 borders">
            <div class="col-md-2">
                <span class="font-weight-bold">Category</span>
                <li class="list_image">{{ $specifications->category->title }}</li>
            </div>
            <div class="col-md-2">
                <span class="font-weight-bold">File Type</span>
                @foreach ($specifications->file_type as $file_types)
                    <li class="list_image">{{ $file_types->name }}</li>
                @endforeach
            </div>
            <div class="col-md-3">
                <span class="font-weight-bold">Addon</span>
                @foreach ($specifications->addon as $addons)
                    <li class="list_image">{{ $addons->name }}</li>
                @endforeach
            </div>
            <div class="col-md-2">
                <span class="font-weight-bold">Size</span>
                @foreach ($specifications->size as $sizes)
                    <li class="list_image">{{ $sizes->name }}</li>
                @endforeach
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <a href="" class="btn btn-md rounded-0 text-light shadow-sm" style="background: #19AAF8;">Order
                        Now</a>
                    <p class="price_bold m-0">${{ $bg_price + $file_price + $align_price + $color_price + $dpi_price + $addon_price + $size_price}}</p>
                    <span>Per Image</span>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    <div class="marketplace_list card p-4 mt-2" style="border-bottom:4px solid #ddd;">
        {{ $Specification->links() }}
    </div>

</section>
@endsection
