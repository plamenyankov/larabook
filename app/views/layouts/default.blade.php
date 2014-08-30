<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Larabook</title>
    {{ HTML::style('css/main.css') }}
    {{ HTML::style('css/animate.css') }}
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

</head>
<body>
@include('partials.navbar')

<div class="row">
    @include('flash::message')
    @yield('content')
</div>

</body>
<script src="{{ URL::asset('js/foundation.min.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
<script>
    $('.button').addClass('animated bounceInLeft');
    $('li').addClass('animated bounce');
</script>
</html>