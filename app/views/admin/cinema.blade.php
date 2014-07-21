@extends('layouts.admin')

@section('header')
    @include('layouts.partials.nav')
@stop

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>
    <div class="row margin-top-two">
        <div class="col-md-12">
            <div class="well well-lg">
                <div class="row">
                    @foreach ($cinemas as $cinema)
                    <div class="col-md-3 margin-top-two">
                        <div class="form-group">
                            <label for="cinema-1">Cinema {{ $cinema->id }}
                                <a href="{{ URL::to('admin/dashboard/manage-showtime', [$cinema->id]) }}" class="btn btn-xs btn-primary">
                                    <span class="glyphicon glyphicon-plus"></span> Manage showtime
                                </a>
                            </label>
                            <select name="" id="" class="form-control">
                                <option value="">How to train your dragon 2</option>
                            </select>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('header')
    @include('layouts.partials.footer')
@stop
