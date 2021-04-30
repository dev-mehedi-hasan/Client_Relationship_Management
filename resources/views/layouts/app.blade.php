<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
        {{--CSS--}}
        @include('layouts.partials.styles')
    </head>
    <body style="background-image: url('{{ asset('public/assets/images/background.png') }}'); background-size: cover;">
        <div class="wrapper">
            <div id="content">
                {{-- @section('navbar')
                    @include('layouts.partials.navbar')
                @show --}}
                @section('preloader')
                    @include('layouts.partials.preloader')
                @show
                    @yield('content')
            </div>
        </div>
            @include('layouts.partials.scripts')
    </body onLoad="disableClick()">
</html>


