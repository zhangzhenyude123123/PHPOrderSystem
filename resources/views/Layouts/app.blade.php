<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'LaraBBS') OrderSystem</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ mix('css/toastr.css') }}" rel="stylesheet">--}}
{{--    <link href='css/toastr.css' rel="stylesheet"/>--}}
</head>

<body>
<div id="app" class="{{ route_class() }}-page">

    @include('Layouts.header')

    <div class="container">

        @include('Tools.message')

        @yield('content')

    </div>

    @include('Layouts.footer')
</div>

<script src="{{ mix('js/app.js') }}"></script>
{{--<script src="{{ mix('js/toastr.js') }}"></script>--}}
<script src='js/toastr.js'></script>

</body>

</html>
