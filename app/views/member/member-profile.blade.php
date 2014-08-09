@extends('layouts.main')

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a href="{{ URL::to('member') }}" class="btn btn-default">
                {{ HTML::image('img/back.png') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <h1>Account History</h1>
            <hr>
            <ul class="list-unstyled">
                <li><h2><small>Name:</small> Jenary Madia</h2></li>
                <li><h3><small>Date registered:</small> August 8, 2014</h3></li>
                <li><h3><small>Contact #:</small> 09353626640</h3></li>
                <li><h3><small>Email:</small> buboi_tanga@yahoo.com</h3></li>
                <li><a href="" class="btn btn-primary btn-sm margin-top-two" data-toggle="modal" data-target="#myModal-change-pass">Change Password</a> <a href="" class="btn btn-primary btn-sm margin-top-two"data-toggle="modal" data-target="#myModal-edit-account">Edit Account</a></li>
            </ul>
        </div>

        <!-- Modal Change Password -->
        @include('member.partials.change-password')

        <!-- Modal Edit Account -->
        @include('member.partials.edit-account')

    </div>
</div>
@stop