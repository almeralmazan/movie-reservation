@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row login-container">
        <div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => 'admin/login', 'role' => 'form']) }}
                    <fieldset>
                        <div class="form-group">
                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required', 'autofocus']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
                        </div>
                        {{ Form::submit('Login', ['class' => 'btn btn-lg btn-success btn-block']) }}
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif
        </div>
    </div>
</div>
@stop
