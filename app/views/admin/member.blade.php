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
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Date registered</th>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->first_name .' '. $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile_number }}</td>
                        <th>{{ date('F j, Y', strtotime($user->created_at)) }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop