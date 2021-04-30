<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
        {{--CSS--}}
        @include('layouts.partials.styles')
    </head>
    <body>
        @section('preloader')
        @include('layouts.partials.preloader')
        @show

        @section('sidenavbar')
        @include('layouts.partials.sidenavbar')
        @show
        
        <div class="container-fluid">
        @yield('content')
        </div>
        </div>
        </div>
        @include('layouts.partials.scripts')
    </body>
</html>