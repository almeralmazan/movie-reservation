@extends('layouts.main')

@section('content')

    @if (Session::has('message'))
        <div class="container">
            <div class="alert alert-success" role="alert">
                <h1>{{ Session::get('message') }}</h1>
            </div>

            <a href="/" class="text-center">Login Now</a>
        </div>
    @elseif (Session::has('error'))
        <div class="container">
            <div class="alert alert-warning" role="alert">
                <h1>{{ Session::get('error') }}</h1>
            </div>
        </div>
    @endif

@stop