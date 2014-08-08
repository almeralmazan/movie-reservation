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

    <div class="row margin-top">
        <div class="col-md-3">
            <input type="text" placeholder="Search name here..." class="form-control" ng-model="name"/>
        </div>
    </div>

    <div class="row margin-top-two" ng-controller="MemberController">
        <div class="col-md-12">
            <table id="mytable" class="table table-bordered table-striped">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact #</th>
                    <th>Date registered</th>
                </thead>
                <tbody>
                    <tr ng-repeat="member in members | filter:name">
                        <td>{[ member.last_name + ', ' + member.first_name ]}</td>
                        <td>{[ member.email ]}</td>
                        <td>{[ member.mobile_number ]}</td>
                        <td>{[ member.created_at | date:'longDate']}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop