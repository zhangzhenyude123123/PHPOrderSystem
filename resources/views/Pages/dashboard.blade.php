@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="contentbox">
        <div id="Reservebutton">
        <a href="{{route('newreserve')}}"><input type="button" class="btn btn-outline-dark" value='NewReserve'></a>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12 col-md-12 topic-list">
                <div class="card ">
                    <div class="card-header bg-transparent">
                        <ul class="nav nav-pills">
                            <h4>Reserve</h4>
                        </ul>
                    </div>
                    <div class="card-body">
                        {{--Reserve list --}}
                        @include('Pages.UnitPages.reserve_list', ['reserves' => $reserves])
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

