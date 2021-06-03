<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', 'DashBord') OrderSystem</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
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
</body>

</html>
