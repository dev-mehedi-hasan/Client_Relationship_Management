    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{config('app.name')}} - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('public/favicon.png') }}" type="image/x-icon">
