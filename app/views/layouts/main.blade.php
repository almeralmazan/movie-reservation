<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    {{ HTML::style('css/foundation.min.css') }}
    {{ HTML::style('css/foundation-icons.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::script('js/vendor/modernizr.js') }}
</head>
<body>

<div class="content row">
    @yield('content')
</div>

{{ HTML::script('js/vendor/jquery.js') }}
</body>
</html>
