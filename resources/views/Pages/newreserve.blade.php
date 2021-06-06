@extends('layouts.app')
@section('title','Reserve')
@section('content')

    <div class="container">
        <div class="col-md-8 offset-md-2">

            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="glyphicon glyphicon-edit"></i> Booking A New Reserve
                    </h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('newreserve.edit',Auth::user()->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('Tools.error')
                        @for($i=getCarnivalDay()+1;$i<=getCarnivalMax();$i++)
                            <div class="form-group booking">
                            <input type="checkbox" name="input{{$i}}" value="{{$i}}">Day{{$i}}
                            </div>
                        @endfor
                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
