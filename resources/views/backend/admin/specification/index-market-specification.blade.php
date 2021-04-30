@extends('layouts.master')
@section('title', 'Specification')
@push('styles')
<style>
    .{
        width: 12.5%;
    }
    .pagination {
        float: right;
        margin: 0;
    }
    .page-item.active .page-link {
        background-color: #19AAF8;
        border-color: #19AAF8;
    }
    . > li.list_image{
            float: left !important;
            margin-left: 38px !important;
            min-width: 150px !important;
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

    <div class="row mx-1 mt-2 bg-white shadow-sm">
        <div class="col-12 d-none d-md-block">
            <h3 class="d-flex justify-content-between m-0 py-3">Marketplace
                <a href="{{ route('admin.specifications.create') }}" class="btn btn-sm text-light rounded-0 btn-bg-color"><i class="fa fa-plus fa-sm"></i> Add New Specification</a>
            </h3>
        </div>
        {{-- mobile button --}}
        <div class="col-12 d-block d-md-none">
            <h4 class="d-flex justify-content-between m-0 py-3">Marketplace
                <a href="{{ route('admin.specifications.create') }}" class="btn btn-sm text-light rounded-0 btn-bg-color"><i class="fa fa-plus fa-sm"></i> Create</a>
            </h4>
        </div>
    </div>

    @foreach ($Specification as $item)

    <div class="marketplace_list mx-1 shadow-sm bg-white p-4 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="marketplace_logo">
                    <h4 class="m-0">{{ $item->category->title }}</h4>
                </div>
            </div>
        </div>

        <div class="row pl-4 mt-3">
            <div class="col-12">
                <div class="">
                    @php
                        $bg_price = 0;
                    @endphp
                    @foreach ($item->background as $backgrounds)
                        <li class="list_image">{{ $backgrounds->name }}</li>
                        @php
                            $bg_price = $bg_price + $backgrounds->price;
                        @endphp
                    @endforeach
                </div>
                <div class="">
                    @php
                        $file_price = 0;
                    @endphp
                    @foreach ($item->file_type as $file_types)
                        <li class="list_image">{{ $file_types->name }}</li>
                        @php
                            $file_price = $file_price + $file_types->price;
                        @endphp
                    @endforeach
                </div>
                <div class="">
                    @php
                        $align_price = 0;
                    @endphp
                    @foreach ($item->alignment as $alignments)
                        <li class="list_image">{{ $alignments->name}}</li>
                        @php
                            $align_price = $align_price + $alignments->price;
                        @endphp
                    @endforeach
                </div>
                <div class="">
                    @php
                        $color_price = 0;
                    @endphp
                    @foreach ($item->color as $colors)
                        <li class="list_image">{{ $colors->name }}</li>
                        @php
                            $color_price = $color_price + $colors->price;
                        @endphp
                    @endforeach
                </div>
                <div class="">
                    @foreach ($item->margin as $margins)
                        <li class="list_image">{{ $margins->margin }} px</li>
                    @endforeach
                </div>
                <div class="">
                    @php
                        $dpi_price = 0;
                    @endphp
                    @foreach ($item->dpi as $dpis)
                        <li class="list_image">{{ $dpis->name }}</li>
                        @php
                            $dpi_price = $dpi_price + $dpis->price;
                        @endphp
                    @endforeach
                </div>
                <div class="">
                    @php
                        $addon_price = 0;
                    @endphp
                    @foreach ($item->addon as $addons)
                        <li class="list_image">{{ $addons->name }}</li>
                        @php
                            $addon_price = $addon_price + $addons->price;
                        @endphp
                    @endforeach
                </div>
                <div class="">
                    @php
                        $size_price = 0;
                    @endphp
                    @foreach ($item->size as $sizes)
                        <li class="list_image">{{ $sizes->name }}</li>
                        @php
                            $size_price = $size_price + $sizes->price;
                        @endphp
                    @endforeach
                </div>
            </div>
            
        </div>

        <div class="row pl-4 mt-3">
            <div class="col-md-12  d-flex justify-content-end">
                <div class="text-center">
                    <p class="price_bold m-0 text-center">${{ $bg_price + $file_price + $align_price + $color_price + $dpi_price + $addon_price + $size_price}}</p>
                    <span style="font-size: 15px; font-weight: normal;">Per Image</span>
                </div>
            </div>
        </div>

    </div>

    @endforeach

    <div class="row shadow-sm  bg-white mx-1 p-4 mt-2" >
        {{ $Specification->links() }}
    </div>

@endsection
