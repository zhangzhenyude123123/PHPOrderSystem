<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'LaraBBS') OrderSystem</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
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
{{--<script src='js/toastr.js'></script>--}}

</body>

</html>
