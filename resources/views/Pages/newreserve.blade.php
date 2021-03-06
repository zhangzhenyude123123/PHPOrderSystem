@extends('layouts.app')
@section('title','Reserve')
@section('content')

    <div class="contentbox">

        <div class="container">
            @include('Tools.message')
            <div class="col-md-8 offset-md-2">

                <div class="card">
                    <div class="card-header">
                        <h4>
                            <i class="glyphicon glyphicon-edit"></i> Booking A New Reserve
                        </h4>
                    </div>

                    <div class="card-body" id="BoxGroup">

                        <form action="{{ route('newreserve.edit',Auth::user()->id) }}" method="POST">
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                            @include('Tools.error')
                            @for($i=getCarnivalDay()+1;$i<=getCarnivalMax();$i++)
                                <div class="form-check booking">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="{{$i}}">
                                        Day{{$i}}
                                    </label>
                                </div>
                            @endfor


                            <div class="well well-sm">
                                <button type="submit" class="btn btn-outline-dark">Post</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
