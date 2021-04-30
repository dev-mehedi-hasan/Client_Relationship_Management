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

    <div class="row">
        <div class="col-12">
            <div class="py-3 px-3 mt-2 shadow-sm bg-white">
                <h2 class="m-0">Contact Us</h2>
                <p class="m-0">If you need help or have any questions, feel free to contact us,
                    price setting when you are planning to upload large volumes.</p>
            </div>
        </div>
    </div>

    <section class="bg-white px-3 py-5 mt-3 shadow-sm">
        <div class="row">
            <div class="col-xl-6 col-sm-12 col-12">
                <form action="{{ route('client.contacts-us.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control rounded-0" id="" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control rounded-0" id="" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="" class="form-control rounded-0" rows="4" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-md rounded-0 shadow-sm text-white" style="background: #19AAF8;">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-6 col-sm-12 col-12  d-flex justify-content-center align-items-center">
                <div class="get_in_touch shadow-sm"
                    style="background-color: #19AAF8; transform: rotate(45deg); padding: 30px; width: 280px; height: 280px;">
                    <div class="text_in_touch" style="transform: rotate(-45deg); margin-top: 30%; text-align: center;">
                        <h3 class="text-white">GET IN TOUCH</h3>
                        <span class=" d-block text-dark">+8801747776531</span>
                        <span class=" d-block text-dark">info@dclipping.com</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
