@extends('layouts.master')
@section('title', 'Select Specification')
@push('styles')
<style>
    .select-spec {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 50px;
        color: #fff;
    }

    .all-step,
    .market {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: #19AAF8;
        ;
        height: auto;
        padding: 15px;
    }

    .img>img {
        width: 100%;
        height: 72px;
    }

    /* .step-text.text-center p {
    color: #fff !important;
} */
</style>
@endpush
@section('preloader')
@parent
@endsection
@section('sidenavbar')
@parent
@endsection
@section('content')
    <div class="row shadow-sm bg-white mt-2 py-3" style="margin: 0 2px;">
        <div class="col-12">
            <h3 class="m-0 font-weight-bold">
                Select Specification
            </h3>
        </div>
    </div>
    <div class="row mt-5" style="margin: 0 2px;">
        <div class="col-xl-6 px-0 col-12 pl-xl-0 pr-xl-2 mb-3 mb-lg-0">
            <div class="all-step shadow-sm">
                <div class="img mb-1">
                    <img src="{{ URL::asset('public/assets/images/step.svg') }}" alt="">
                </div>
                <div class="step-head">
                    <h2 class="text-white">Step-By-Step</h2>
                </div>
                <div class="step-text text-center">
                    <p class="text-white">Create Amazon, eBay, or Google Shopping compliant product images in
                        just one click !</p>
                </div>
                <div class="step-btn">
                    <a href="{{ route('client.specification-stepbystep.index') }}"
                        class="btn btn-light rounded-0 shadow-sm px-5">Continue</a>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-12 px-0 pr-xl-0 pl-xl-2">
            <div class="market bg-white shadow">
                <div class="img mb-1">
                    <img src="{{ URL::asset('public/assets/images/market.svg') }}" alt="">
                </div>
                <div class="step-head">
                    <h2>Marketplaces</h2>
                </div>
                <div class="step-text text-center ">
                    <p class="text-dark">Create Amazon, eBay, or Google Shopping compliant product images in just one
                        click !</p>
                </div>
                <div class="step-btn">
                    <a href="{{ route('client.specification-marketplace.index') }}"
                        class="btn text-light px-5 rounded-0 shadow-sm" style="background: #19AAF8;">Continue</a>
                </div>  
            </div>
        </div>
    </div>

@endsection
