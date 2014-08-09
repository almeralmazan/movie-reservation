@extends('layouts.main')

@section('content')
<div class="container margin-top">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <!-- <h1 class="text-center login-title">Forgot Password</h1> -->
            <div class="account-wall">
                <form class="form-signin">
                    <input type="email" class="form-control" placeholder="Email" required autofocus>
                    <button class="btn btn-lg btn-primary btn-block margin-top-mini" type="submit">
                        Reset password
                    </button>
            </div>
            <a href="/" class="text-center new-account">Back to Home Page</a>
        </div>
    </div>
</div>
@stop