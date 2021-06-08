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

{{--                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked="">--}}
{{--                                <label class="btn " for="btnradio1">Radio 1</label>--}}
{{--                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" checked="">--}}
{{--                                <label class="btn" for="btnradio2">Radio 2</label>--}}
{{--                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" checked="">--}}
{{--                                <label class="btn" for="btnradio3">Radio 3</label>--}}

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


{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('#checkGroup').find('checknumber').bind('click', function(){--}}
{{--                $('#checkGroup').find('input[type=checkbox]').not(this).attr("checked", false);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
