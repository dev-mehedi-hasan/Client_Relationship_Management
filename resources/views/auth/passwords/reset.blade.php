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
        height: 100%: height:100vh;
    }

    .all-container {
        margin: 0;
        margin-top: -50px !important;
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

        .card-content {
            height: 90%;
        }
    }
</style>

@endpush
@section('content')
<div class="container-fluid parent-container"
    style="height: 100vh; height: 100%; background-image: url('{{URL::asset('public/assets/images/background.png')}}')">
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
                            <h3 class="text-left mb-4 log-heading">Change Password</h3>
                        </div>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row d-flex flex-column">
                                <label for="email" class="col-md-4 col-form-label text-md-left pl-0">{{ __('E-Mail Address') }}</label>

                                <div class="input">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row d-flex flex-column">
                                <label for="password" class="col-md-4 col-form-label text-md-left pl-0">{{ __('Password') }}</label>

                                <div class="input">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row d-flex flex-column">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-left pl-0">{{ __('Confirm Password') }}</label>

                                <div class="input">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0 d-flex flex-column">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
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
      
      
      
      
      
      
      
      
      
        {{-- <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form> --}}

