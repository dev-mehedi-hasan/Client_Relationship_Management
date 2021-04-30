@extends('layouts.app')
@push('styles')
<style>
    .login-btn {
        width: 150px;
        padding: 5px;
        color: #fff;
        background: #19AAF8;
        border: none;
        font-size: 20px;
        cursor: pointer;
        font-family: lato;
    }

    .login {
        font-family: lato;
        /* margin: 0;
    margin-top:-50px !important;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%); */
        /* position:relative; */
    }

    .parent-container {
        position: relative;
        height: 100%;
        height:100vh;
    }

    .all-container {
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .log-text {
        margin-left: -13px;
    }

    @media screen and (max-width:768px) {
        .log-heading {
            font-size: 20px;
        }

        .card-body {
            padding: 20px !important;
        }
    }
</style>

@endpush
@section('content')
<div class="container-fluid parent-container">
    <section class="login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12 all-container">
                <div class="card p-4 card-content">
                    <div class="login_img text-center">
                        <img style="width:120px;" src="{{URL::asset('public/assets/images/full_width_logo.png')}}"
                            alt="">
                    </div>
                    <div class="card-body" style="padding:50px;">
                        <div class="log-text">
                            <h3 class="text-left mb-4 log-heading">Create an account</h3>
                        </div>
                        <form method="POST" action="{{ route('auth.store') }}">
                            @csrf

                            <div class="form-group row d-flex flex-column">
                                <div class="label">
                                    <label class="col col-form-label text-md-left pl-0">{{ __('Your E-Mail') }}</label>
                                </div>

                                <div class="input">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row d-flex flex-column">
                                <div class="label">
                                    <label class="col col-form-label text-md-left pl-0">{{ __('Your Phone') }}</label>
                                </div>

                                <div class="input">
                                    <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number') }}" >

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row d-flex flex-column">
                                <div class="label">
                                    <label class="col col-form-label text-md-left pl-0">{{ __('Password') }}</label>
                                </div>

                                <div class="input">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row d-flex flex-column">
                                <div class="label">
                                    <label class="col col-form-label text-md-left pl-0">{{ __('Confirm Password') }}</label>
                                </div>

                                <div class="input">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="confirm_password">

                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row d-flex flex-column">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check form-group">
                                                <input class="form-check-input" type="radio" name="user_type" id="worker" value="worker" checked>
                                                <label class="form-check-label" for="worker">
                                                  Worker
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-group">
                                                <input class="form-check-input" type="radio" name="user_type" id="client" value="client">
                                                <label class="form-check-label" for="client">
                                                  Client
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex flex-column mb-3">
                                <div required class="g-recaptcha" data-sitekey="6LePPBAaAAAAAP7ZsHs5oUijjzkxNSGhLZuKJcFk"></div>
                            </div>
                            @error('g-recaptcha-response')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group text-center">
                                <div class="btn-block">
                                    <button type="submit" class="login-btn">
                                        {{ __('Sign Up') }}
                                    </button>
                                </div>
                                <div class="sign-up">
                                    <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
