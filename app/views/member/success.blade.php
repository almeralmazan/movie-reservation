@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row hidden-print margin-top">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center alert alert-success">
                <strong>
                    You've successfully reserved!
                </strong>
            </h1>
            <h3 class="alert alert-info text-center">Check your message we sent to your mobile phone</h3>
            <p class="text-center">{{ HTML::link('member', 'Continue browsing') }}</p>
        </div>
    </div>
</div>
@stop
