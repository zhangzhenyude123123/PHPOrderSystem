@extends('Layouts.app')

@section('content')

<div id="mainpage2">
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Party!</div>
            <div class="masthead-subheading">VIP {{$user->name}}</div>
        </div>
    </header>
</div>
@endsection
