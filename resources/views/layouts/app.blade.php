<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>fitnessup - @yield('title')</title>
</head>

<body>
    {{-- Main Header --}}
    @include('layouts.header')

    {{-- Main Content --}}
    @yield('content')

    {{-- Main Footer --}}
    @include('layouts.footer')
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
