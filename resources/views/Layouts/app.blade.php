<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Carnival System</title>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/toastr.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body id="page-top">

<div id="app" class="{{ route_class() }}-page">

    {{--Navigation--}}
    @include('Layouts.header')

        @yield('content')

    {{--Footer--}}
    @include('Layouts.footer')

</div>


<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ URL::asset('js/toastr.js') }}"></script>

</body>
</html>
