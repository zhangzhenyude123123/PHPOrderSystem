@extends('Layouts.app')
@section('title', '首页')

@section('content')
    <h1>This is a Picture</h1>

   <div>
       <a href="{{Route('check.show')}}">Check IN</a>
   </div>

@stop
