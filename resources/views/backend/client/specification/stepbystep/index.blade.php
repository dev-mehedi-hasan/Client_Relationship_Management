@extends('layouts.master')
@section('title', 'Order')
@push('styles')
<link href="{{ asset('public/assets/dist/min/basic.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/dist/min/dropzone.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/dist/basic.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/dist/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw=="
    crossorigin="anonymous" />

<style>
    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        /* padding: 40px; */
        min-width: 300px;
    }

    .client_order-upload {
        width: 1525px;
        height: 750px;
    }

    .all_cat {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .cat_spec {
        align-self: center;
        justify-self: center;
        width: 670px;
        height: 185px;
        background: #ffffff;
        margin-bottom: 20px;
        border: 4px solid transparent;
        transition: .5s ease-in;
    }

    .cat_body {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 25px;

    }

    .cat_body h3 {
        margin-top: 30px;
    }

    .all-order {
        max-width: 1525px;
        width: 1525px;
        background: #fff;
    }

    .client_spec {
        border: 1px solid black;
        padding: 25px;
        margin: 25px auto;
    }

    .actives{
        border: 4px solid #19AAF8;
    }
    .cat_spec:hover {
        border: 4px solid #19AAF8;
        cursor: pointer;
    }

    .client_spec_item {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .checkbox {
        margin-left: -20px;
    }

    .form-check {
        position: relative;
        display: flex !important;
        align-items: center !important;
        padding-left: 1.25rem;
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;

    }

    .client_spec_btn a {
        margin-right: 30px;
        padding: 3px;
        background: #19aaf8;
        border: none;
    }

    .client_spec_btn a:nth-child(1),
    .client_spec_btn a:nth-child(3) {
        width: 86px;
        height: 32px;
    }

    .client_spec_btn a:nth-child(2) {
        width: 182px;
        height: 32px;
    }

    .client_spec_btn p {
        display: inline-block;
    }

    /* input css start */
    .wrapper-check {

        display: flex;
        align-items: center;
        position: relative;
        margin-bottom: 15px;
    }

    input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        height: 20px;
        width: 20px;
        background-color: #d5d5d5;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        outline: none;
    }

    .wrapper-check:nth-child(6)>label {
        display: flex;
        align-items: center;
    }

    label {
        color: #4c4c4c;
        font-weight: 600;
        cursor: pointer;
    }

    input[type="checkbox"]:after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f00c";
        font-size: 12px;
        position: absolute;
        color: white;
        display: none;
        top: 6px;
        left: 4px;
    }

    input[type="checkbox"]:hover {
        background-color: #a5a5a5;
    }

    input[type="checkbox"]:checked {
        background-color: #0d0e0d;
    }

    input[type="checkbox"]:checked:after {
        display: block;
    }

    /* input css end */
    .sel_btn a {
        padding: 7px 70px;
        font-size: 16px;
        background: #19aaf8;
        border: none;
    }

    .sel_btn h3 {
        font-size: 49px;
        font-family: Lato;
    }

    .sel_btn p {
        font-size: 16px;
    }

    .prev_next_btn {
        text-align: center;
        overflow: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 50px;
        padding-bottom: 30px;
    }

    h1.billing_head {
        margin-left: 48px;
        margin-bottom: -37px;
        font-size: 37px;
    }

    /* input {
        padding: 10px;
        /* width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    } */

    .pay-img {
        margin-left: 60px;
        font-size: 25px;
        color: #0f35ec;
    }

    .upload_img {
        display: flex;
        justify-content: space-evenly;
    }

    .upl_img {
        padding-right: 25px
    }

    .upld-sec {
        background: #f5f7f8;
        width: 848px;
        height: 260px;
        border: 3px dotted;
    }

    .btn {
        border-radius: none !important;
    }

    .upld_btn {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 50px 30px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
        width: 250px;
        height: 212px;
    }

    .upload_btn_wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
        cursor: pointer;
        margin-bottom: 28px;
        background: #ffffff;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }


    /* .order-title {
    margin: 21px 0 0 13px;
  } */

    /* button:hover {
    opacity: 0.8;
  } */

    #prevBtn {
        background-color: #bbbbbb;
    }

    .next {
        border: none !important;
        padding: 10px 50px;
        background: #19aaf8;
    }

    button:focus {
        outline: 1px dotted;
        /* outline: 5px auto -webkit-focus-ring-color; */
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        border: none;
        padding: 10px 15px;
    }

    .step.active {
        opacity: 1;
        color: #19AAF8;
        border-bottom: 2px solid #19AAF8;
    }

    /* Mark the steps that are finished and valid: */


    @media(max-width:768px) {
        .hide_text {
            display: none;
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


<form id="regForms" action="{{ route('client.specification-stepbystep.store') }}" method="POST">
    @csrf
    <!-- Circles which indicates the steps of the form: -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="order-title m-0 py-4 pl-3" style="font-family: Arial, Helvetica, sans-serif;">Create Specification</h2>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12 mr-auto">
            <div class="mr-auto"
                style="text-align:center; margin-bottom:20px; border-bottom:1px solid #ddd">
                <span style="width:19%" class="step"><i class="fas fa-upload"></i> Specification</span>
                <span style="width:19%" class="step"><i class="fas fa-upload"></i> Category</span>
                <span style="width:19%" class="step"> <i class="fas fa-list-ul"></i> Setting</span>
                <span style="width:19%" class="step"><i class="fas fa-money-check-alt"></i>
                        Format</span>
                <span style="width:19%" class="step"><i class="far fa-check-square"></i>
                        Add-ons</span>
            </div>
        </div>
    </div>
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
        <section class="user_settings_create_specification card p-4">
            <div class="form-group">
                <label>Specification Name</label>
                <input type="text" name="specification_name" class="form-control rounded-0" required>
            </div>
        </section>
    </div>

    <div class="tab">
        <div class="container-fluid">
            <div class="all_cat">

                @foreach ($Category as $Categories)
                <label for="{{ $Categories->id }}">
                    <div id="categorys" class="cat_spec shadow-sm">
                        <input type="radio" id="{{ $Categories->id }}" style="display: none;" value="{{ $Categories->id }}" name="category">
                        <div class="cat_body">
                            <img src="{{ asset('public/assets/images/specification_category/'.$Categories->image) }}"
                                alt="">
                            <h3>{{ $Categories->title }}</h3>
                        </div>
                    </div>
                </label>
                @endforeach

            </div>
        </div>
    </div>

    <div class="tab">

        <section class="user_settings_create_specification card p-4">
            <div class="row px-4">
                <div class="col-md-7">
                    <div class="file_type">
                        <h4>FILE TYPE</h4>

                        @foreach ($File_Type as $item)
                            <div class="wrapper-check">
                                <input type="checkbox" name="file_type[]" value="{{ $item->id }}" id="file_{{ $item->id }}">
                                <label for="file_{{ $item->id }}"> &nbsp {{ $item->name }}</label>
                            </div>
                        @endforeach

                    </div>
                    <hr style="border:1px solid #ddd">
                    <div class="background_type">
                        <h4>Background</h4>

                        @foreach ($Background as $item)
                            <div class="wrapper-check">
                                <input type="checkbox" name="background[]" value="{{ $item->id }}" id="background_{{ $item->id }}">
                                <label for="background_{{ $item->id }}"> &nbsp {{ $item->name }}</label>
                            </div>
                        @endforeach

                    </div>

                    <hr style="border:1px solid #ddd">
                    <div class="alignment_type">
                        <h4>ALIGNMENT</h4>

                        @foreach ($Alignment as $item)
                            <div class="wrapper-check">
                                <input type="checkbox" name="alignment[]" value="{{ $item->id }}" id="align_{{ $item->id }}">
                                <label for="align_{{ $item->id }}"> &nbsp {{ $item->name }}</label>
                            </div>
                        @endforeach

                    </div>

                    <hr style="border:1px solid #ddd">
                    <div class="color_profile">
                        <h4>Color Profile</h4>

                        @foreach ($Color as $item)
                            <div class="wrapper-check">
                                <input type="checkbox" name="color[]" value="{{ $item->id }}" id="color_{{ $item->id }}">
                                <label for="color_{{ $item->id }}"> &nbsp {{ $item->name }}</label>
                            </div>
                        @endforeach

                    </div>
                    <hr style="border:1px solid #ddd">
                    <div class="margin_type">
                        <h4>Margin</h4>

                        <div class="wrapper-check">
                            <label>
                                Top &nbsp<input type="text" name="margin[]" id="check" class="" style="width:50px;">
                                &nbsp Right : &nbsp<input type="text" name="margin[]" id="check" class="" style="width:50px;">
                                &nbsp Bottom : &nbsp<input type="text" name="margin[]" id="check" class="" style="width:50px;">
                                &nbsp Left : &nbsp<input type="text" name="margin[]" id="check" class="" style="width:50px;">
                            </label>
                        </div>


                        <hr style="border:1px solid #ddd">
                        <div class="dpi_type">
                            <h4>DPI</h4>

                            @foreach ($Dpi as $item)
                                <div class="wrapper-check">
                                    <input type="checkbox" name="dpi[]" value="{{ $item->id }}" id="dpi_{{ $item->id }}">
                                    <label for="dpi_{{ $item->id }}"> &nbsp {{ $item->name }}</label>
                                </div>
                            @endforeach

                        </div>
                        <hr style="border:1px solid #ddd">
                    </div>

                </div>

                <div class="col-md-5">
                    <div class="product_img_sample">
                        <div class="card">
                            <img src="{{ asset('public/assets/images/shoe.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="tab py-3 bg-white">
        <div class="container-fluid">
            <h3>Select a Size Format</h3>

            @foreach ($Size as $item)
                <div class="wrapper-check">
                @if ($item->name == 'Custom')
                    <input type="checkbox" name="custom_size_format" value="{{ $item->id }}" id="custom_size_format" class="custom_size_format">
                    <label for="size_{{ $item->id }}"> &nbsp {{ $item->name }}</label>
                    <label>
                        &nbsp;<input type="text" name="value_one" id="value1" class="" style="width:50px;">&nbsp; :
                        &nbsp;<input type="text" name="value_two" id="value2" class="" style="width:50px;">
                    </label>
                @else
                    <input type="checkbox" name="size_format[]" value="{{ $item->id }}" id="size_{{ $item->id }}">
                    <label for="size_{{ $item->id }}"> &nbsp {{ $item->name }}</label>
                @endif
                </diV>
            @endforeach

        </div>
    </div>

    <div class="tab">
        <section class="create_specification_add_on card p-4">
            <div class="row mb-4">
                <div class="col-md-12">
                    <h3>Popular Add Ons</h3>
                </div>
            </div>

            @foreach ($Addon as $item)
                <div class="wrapper-check">
                    <input type="checkbox" name="addon[]" value="{{ $item->id }}" id="addon_{{ $item->id }}">
                    <label for="addon_{{ $item->id }}"> &nbsp; {{ $item->name }} &nbsp;<small> ${{ $item->price }}</small></label>
                </div>
            @endforeach

        </section>
    </div>

    <div class="prev_next_btn">
        <div style="float:right;">
            <button class="btn btn-md rounded-0 shadow-sm text-dark px-3" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button class="btn btn-md rounded-0 shadow-sm text-light px-3" style="background: #19aaf8;" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>

</form>
@push('scripts')
<script src="{{ asset('public/assets/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/dropzone.js') }}"></script>
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the crurrent tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForms").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        var value1 = document.getElementById("value1");
        var value2 = document.getElementById("value2");
        if(document.getElementById('custom_size_format').checked){
                        if (value1.value == "" && value1.value == "") {
                        // add an "invalid" class to the field:
                        value1.className += "invalid";
                        value2.className += "invalid";
                        // and set the current valid status to false
                        valid = false;
                    }
        }
                // if (checkbox.is(':checked')) {
                //     if (value1.value == "") {
                //         // add an "invalid" class to the field:
                //         value1.className += "invalid";
                //         // and set the current valid status to false
                //         valid = false;
                //     }
                // }
        // for (i = 0; i < y.length; i++) {
        //     // If a field is empty...
        //     if (y[i].value == "") {
        //         // add an "invalid" class to the field:
        //         y[i].className += " invalid";
        //         // and set the current valid status to false
        //         valid = false;
        //     }
        // }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }

    // Active Category
    $('div#categorys').on( 'click', function() {
        $( 'div#categorys' ).removeClass('actives');
        $( this ).addClass('actives');
    });

</script>
@endpush
@endsection
