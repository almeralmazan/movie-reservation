<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-datetimepicker.min.css') }}
    {{ HTML::style('css/style.css') }}
</head>
<body>

@yield('header')

@yield('content')

@yield('footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/bootstrap-datetimepicker.js') }}
{{ HTML::script('js/dataService.js') }}
{{ HTML::script('js/controllerPage.js') }}
{{ HTML::script('js/script.js') }}
</body>
</html>
