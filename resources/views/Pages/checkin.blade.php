@extends('Layouts.app')
@section('title','Check-In')
@section('content')

<div class="contentbox" id="checkbox">

    <div class="container">
    @include('Tools.message')

    <div class="col-md-8 offset-md-2" id="checkbox">

        <div class="card">
            <div class="card-header">
                <h4>
                    <i class="glyphicon glyphicon-edit"></i> Check In
                </h4>
            </div>

            <div class="card-body">
                <form action="{{route('check.auth')}}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="POST">
{{--                    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    @include('Tools.error')
                    <div class="form-group">
                        <label for="email-field">ValidateCode</label>
                        <input class="form-control" type="text" name="validatecode" id="code-field"  />
                    </div>
                    <div class="form-group">
                        <label for="password-field">Password</label>
                        <input class="form-control" type="password" name="password" id="password-field"  />
                    </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
</div>
@endsection
