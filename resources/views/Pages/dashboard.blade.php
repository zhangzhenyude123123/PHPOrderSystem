@extends('Layouts.index')

@section('title','dashboard')
@section('content')
    <span><a href="{{route('newreserve')}}">Newreserve</a></span>
    <div class="row mb-5">
        <div class="col-lg-9 col-md-9 topic-list">
            <div class="card ">
                <div class="card-header bg-transparent">
                    <ul class="nav nav-pills">
                        <li class="nav-item">My Reserve</li>
                    </ul>
                </div>

                <div class="card-body">
                    {{-- 预定列表 --}}
                    @include('Pages.UnitPages.reserve_list', ['reserves' => $reserves])
                </div>
            </div>
        </div>
    </div>
@endsection

