@extends('layouts.main')

@section('content')
    <h1>Member Page</h1>

    {{ HTML::link('member/logout', 'Logout', ['class' => 'button']) }}
@stop