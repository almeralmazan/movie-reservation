@extends('layouts.main')

@section('content')
<h1 class="text-center">Set Your New Password</h1>

<div class="container margin-top">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <!-- <h1 class="text-center login-title">Forgot Password</h1> -->
            <div class="account-wall">
                {{ Form::open(['url' => 'password-update', 'class' => 'form-signin']) }}

                <input type="hidden" name="token" value="{{ $token }}">

                <input type="email" class="form-control" name="email" placeholder="Email Address" required autofocus>

                <input type="password" class="form-control" name="password" placeholder="Password" required>

                <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required>

                <button class="btn btn-lg btn-primary btn-block margin-top-mini" type="submit">
                    Submit
                </button>
                {{ Form::close() }}

                @if (Session::has('error'))
                <p style="color: red; margin-left: 30px;">{{ Session::get('error') }}</p>
                @endif
            </div>
            <a href="/" class="text-center new-account">Back to Home Page</a>
        </div>
    </div>
</div>
@stop