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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{ URL::to('admin/dashboard/add-movie-page') }}" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-plus"></span> Add movie</a>
                </div>
            </div>
            <div class="row margin-top-two">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Movie title</th>
                                <th>Cinema #</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($movies as $movie)
                            <tr>
                                <td>{{ $movie->title }}</td>
                                <td>
                                    {{ HTML::image('img/movies/' . $movie->image, null, ['class' => 'banner center-block img-responsive img-rounded', 'alt' => 'Responsive image']) }}
                                </td>
                                <td>
                                    <a href="{{ URL::to('admin/dashboard/edit-movie-page', [$movie->id]) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                                    <a href="{{ URL::to('admin/dashboard/delete/movie', [$movie->id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop
