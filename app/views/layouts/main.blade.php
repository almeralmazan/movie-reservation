<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    {{ HTML::style('css/foundation.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{ HTML::style('css/style.css') }}
</head>
<body>

    <!--  Header  -->
    @include('layouts/partials/nav')

    <div class="content">
        @yield('content')
    </div>

    <!--  Footer  -->
    @include('layouts/partials/footer')

{{ HTML::script('js/vendor/jquery.js') }}
{{ HTML::script('js/jquery.cycle2.js') }}
{{ HTML::script('js/foundation.min.js') }}
{{ HTML::script('js/dataService.js') }}
{{ HTML::script('js/controllerPage.js') }}
{{ HTML::script('js/script.js') }}
</body>
</html>
