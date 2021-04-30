@extends('layouts.master')
@section('title', 'Order')
@push('styles')  
<link href="{{ asset('public/assets/dist/min/basic.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/dist/basic.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/css/image-uploader.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    #regForm {
        font-family: Raleway;
        /* padding: 40px; */
        min-width: 300px;
    }

    .client_order-upload {
        width: 1525px;
        height: 750px;
    }

    .all-order {
        max-width: 1525px;
        width: 1525px;
        background: #fff;
    }

    .client_spec {
        border: 1px solid #ccc;
        padding: 25px;
        margin: 25px auto;
    }

    .client_spec_item {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
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

    /* input css start*/
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
        font-size: 18px;
        font-family: sans-serif;
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

    .pay-img {
        margin-left: 20px;
        color: #0f35ec;
    }
    .pay-img > i {
        font-size: 30px;
    }

    .upload_img {
        display: flex;
        justify-content: space-evenly;
    }
    .upl_img{
        position: relative;
    }
    .upl_img > img{
        width: 100%;
    }

    .upld-sec {
        background: #f5f7f8;
        width: 848px;
        height: 260px;
        border: 3px dotted;
    }
    .down-img-overlay {
        background: rgba(18, 84, 115, 0.82);
        width: 100%;
        color: #fff;
        position: absolute;
        bottom: 0;
        padding: 5px;
        opacity: 1;
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

    #prevBtn {
        background-color: #bbbbbb;
    }

    .next {
        border: none !important;
        padding: 10px 50px;
        background: #19aaf8;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        border: none;
        padding: 10px 15px;
    }

    .step.active {
        color: #333;
        border-bottom: 2px solid #333333;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        opacity: 1;
        color: #19AAF8;
        border-bottom: 2px solid #19AAF8;
    }
    .fontstyle{
        font-family: Arial, Helvetica, sans-serif;
    }
    .select_orders{
        background: #19AAF8 !important;
        color: #ffffff !important;
        transition: 1s
    }
    select:focus {
        outline: 0;
    }

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

<form id="regForm" action="{{ route('client.order.store') }}" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
    @csrf
    <!-- Circles which indicates the steps of the form: -->
    @php
        $user_check = App\Models\Specification::where('creator_id', Auth::user()->id)->first();
    @endphp

    @if ($user_check != NULL)

    <div class="row bg-white shadow-sm mt-3 mx-1">
        <div class="col-12">
            <h3 class="m-0 py-3 text-font-family d-flex justify-content-between">New Order
                <a href="{{ route('client.order.index') }}" class="btn btn-sm rounded-0 shadow-sm px-3 text-light btn-danger"><i class="fa fa-backspace"></i> Back to list</a>
            </h3>
        </div>
    </div>

    <div class="mx-1 bg-white shadow-sm">

        <div class="row mt-3">
            <div class="col-md-12 mr-auto">
                <div class="text-center mt-4 mb-4" style="border-bottom:1px solid #ddd">
                    <span style="width:19%" class="step"><i class="fas fa-upload"></i><b class="hide_text">
                            Upload</b></span>
                    <span style="width:19%" class="step"> <i class="fas fa-list-ul"></i> <b
                            class="hide_text">Specification</b></span>
                    <span style="width:19%" class="step"><i class="fas fa-money-check-alt"></i><b class="hide_text">
                            Billing</b></span>
                    <span style="width:19%" class="step"><i class="fas fa-file-alt"></i><b class="hide_text"> Pay</b></span>
                </div>
            </div>
        </div>
    
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <div class="px-3">
                <div class="form-row">
                    <div class="col-md-6 form-group">
                        <label>Order Name</label>
                        <input type="text" name="order_name" class="form-control rounded-0">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Delivery Date</label>
                        <select name="delivery_date" class="form-control rounded-0">
                            <option value="24">24 Hours</option>
                            <option value="48">48 Hours</option>
                            <option value="72">72 Hours</option>
                        </select>
                    </div>
                </div>
                <div class="input-field">
                    <label class="active">Photos</label>
                    <div class="input-images-2" style="padding-top: .5rem;"></div>
                </div>
    
                {{-- <button>Submit and display data</button> --}}
            </div>
        </div>
    
        <div class="tab">
    
            <div class="container-fluid">
    
                @foreach ($Specification as $Specifications)
    
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
    
                <div class="row client_spec">
                    <div class="col-md-3">
                        <li class="list_image fontstyle">{{ $Specifications->category->title }}</li>
                        {{-- <a href="{{ route('client.specification-stepbystep.show',$Specifications->id) }}" class="fontstyle btn btn-sm rounded-0 shadow-sm text-light font-weight-bold" style="background: #19AAF8;">View</a> --}}
                    </div>
                    <div class="col-md-3">
                        @if ($Specifications->custom_size)
                            <li class="list_image fontstyle">{{ $Specifications->custom_size->value_1 }} : {{ $Specifications->custom_size->value_2 }}</li>
                        @endif
                        @foreach ($Specifications->size as $items)
                            <li class="list_image fontstyle">{{ $items->name }}</li>
                        @endforeach
                        {{-- <a href="" class="fontstyle btn btn-md rounded-0 shadow-sm text-light" style="background: #19AAF8;"><i class="fas fa-edit"></i> Edit Specification</a> --}}
                    </div>
                    <div class="col-md-3">
                        @foreach ($Specifications->addon as $items)
                            <li class="list_image fontstyle">{{ $items->name }}</li>
                        @endforeach
                        {{-- <a href="" class="fontstyle btn btn-md rounded-0 shadow-sm text-light" style="background: #19AAF8;"><i class="fa fa-sticky-note" aria-hidden="true"></i> Note</a> <span class="btn btn-md border rounded-0 shadow-sm fontstyle"><i class="fas fa-clock"></i> --}}
                        </span>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
    
                            <label for="{{ $Specifications->id }}">
                                <a id="select_order" class="fontstyle btn btn-md rounded-0 shadow-sm text-dark" style="border: 1px solid #19AAF8; "> Select Now</a>
                                @php $price_per_image = $bg_price + $file_price + $align_price + $color_price + $dpi_price + $addon_price + $size_price @endphp
                                <input type="radio" class="d-none" id="{{ $Specifications->id }}" value="{{ $Specifications->id.','.$price_per_image  }}" name="select_specification">
                            </label>
                            <p class="m-0 font-weight-bold" style="font-size: 25px; color: #333;">${{ $bg_price + $file_price + $align_price + $color_price + $dpi_price + $addon_price + $size_price }}</p>
                            <span class="fontstyle">Per Image</span>
                        </div>
                    </div>
    
                </div>
    
                @endforeach
            </div>
        </div>
    
        <div class="tab">
            <div class="container-fluid billing_sec">
    
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Company Name</label>
                            <input type="text" class="form-control rounded-0" name="company_name">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" value="{{ $Client_info->email }}" class="form-control rounded-0" name="email">
                        </div>
                        <div class="mb-3">
                            <label>Address1</label>
                            <input type="text" class="form-control rounded-0" name="address_one">
                        </div>
                        <div class="mb-3">
                            <label>Address2</label>
                            <input type="text" class="form-control rounded-0" name="address_two">
                        </div>
                        <div class="mb-3">
                            <label>Zip/Postal Code</label>
                            <input type="text" class="form-control rounded-0" name="postal_code">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>EU VAT Number</label>
                            <input type="text" class="form-control rounded-0" name="vat_number">
                        </div>
                        <div class="mb-3">
                            <label>Town/City</label>
                            <input type="text" class="form-control rounded-0" name="city">
                        </div>
                        <div class="mb-3">
                            <label>Country</label>
                            <select name="country" class="form-control rounded-0">
                                <option value="" selected>Select Country</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antartica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                <option value="Croatia">Croatia (Hrvatska)</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="East Timor">East Timor</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="France Metropolitan">France, Metropolitan</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran (Islamic Republic of)</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Panama">Panama</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Span">Spain</option>
                                <option value="SriLanka">Sri Lanka</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Viet Nam</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
    
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Phone</label>
                            @if ($Client_info->phone != NULL)
                                <input type="number" value="{{ $Client_info->phone }}" class="form-control rounded-0" name="phone">
                            @else
                                <input type="number" class="form-control rounded-0" name="phone">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="tab">
            <div class="container-fluid">
    
                <div class="container-fluid">
                    <h5 class="m-0 fontstyle">Payment Method</h5>
    
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="pay-sec d-flex">
                                <div class="pay-method">
                            <div class="wrapper-check">
                                <input type="radio" name="payment" id="creditCard">&nbsp;
    
                                <label for="creditCard" class="fontstyle m-0">Credit Card</label>
                            </div>
                            </div>
                                <div class="pay-img">
                                    <i class="fab fa-cc-visa"></i>
                                    <i class="fab fa-cc-mastercard"></i>
                                    <i class="fab fa-cc-amex"></i>
                                </div>
                            </div>
    
                            <div class="mt-3">
                                <div class="form-group">
                                    <input type="text" name="card_number" class="form-control rounded-0 card_number" placeholder="Card Number">
                                    @error('card_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-6 form-group">
                                        <select name="month" class="form-control rounded-0 month">
                                            <option value="">Month</option>
                                            <option value="Junuary">Junuary</option>
                                            <option value="February">February</option>
                                            <option value="Martch">Martch</option>
                                        </select>
                                        @error('month')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-6 form-group">
                                        <select name="year" class="form-control rounded-0 year">
                                            <option value="">Year</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                        </select>
                                        @error('year')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="cvv" class="form-control rounded-0 cvv" placeholder="CVV">
                                    @error('cvv')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
    
                        <div class="col-md-6 ">
                            <div class="pay-sec d-flex">
                                <div class="wrapper-check">
                                    <input type="radio" name="payment" id="payment">&nbsp;
                                    <label for="payment" class="fontstyle m-0">Paypal</label>
                                </div>
                                <div class="pay-img">
                                    <i class="fab fa-cc-paypal"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="prev_next_btn">
            <div style="float:right;">
                <button class="btn btn-md rounded-0 shadow-sm px-3" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button class="btn btn-md rounded-0 shadow-sm text-light px-4" style="background: #19aaf8;" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>

    </div>
   

    @else
        <div class="row">
            <div class="col-md-12">
                <h2 class="m-0 py-3 pl-3 d-flex justify-content-start" style="font-family: Arial, Helvetica, sans-serif;">New Order
                    <a href="{{ route('client.specification-stepbystep.index') }}" class="ml-3 btn btn-md shadow-sm rounded-0 text-light" style="background: #19AAF8;"><i class="fa fa-plus fa-sm"></i> Create Specification</a>
                </h2>
            </div>
        </div>
    @endif

</form>
@endsection
@push('scripts')
<script src="{{ asset('public/assets/js/image-uploader.js') }}"></script>
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
            document.getElementById("nextBtn").addClass('submitBtn');
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
            document.getElementById("regForm").submit();
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
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
        }
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
    $('a#select_order').on( 'click', function() {
        $('a#select_order').removeClass('select_orders');
        $( this ).addClass('select_orders');
    });

    // multiple image upload
    $('.input-images-2').imageUploader(
        {
        imagesInputName: 'photos',
        }
    );





</script>
@endpush
