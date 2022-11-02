<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script async="" src="{{ asset('assets/admin-panel/js/app.js') }}"></script>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="https://pipeline.mediumra.re/assets/img/favicon.ico" rel="icon" type="image/x-icon">
    <link href="{{ asset('assets/admin-panel/images/icon') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin-panel/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin-panel/css/theme.css') }}" rel="stylesheet" type="text/css"
          media="all">
    <script type="text/javascript"
            src="{{ asset('assets/admin-panel/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin-panel/js/scripts.js') }}"></script>
</head>
<body>
<div class="layout layout-nav-side">
    @include('admin.layouts.components.menu')
    <div class="container">
        <section class="py-4 py-lg-5">
            @yield('content')
        </section>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript"
        src="{{ asset('assets/admin-panel/js/popper.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/admin-panel/js/bootstrap.js') }}"></script>

<script type="text/javascript"
        src="{{ asset('assets/admin-panel/js/autosize.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/admin-panel/js/flatpickr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin-panel/js/prism.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/admin-panel/js/draggable.bundle.legacy.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/admin-panel/js/swap-animation.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/admin-panel/js/dropzone.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('assets/admin-panel/js/list.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/admin-panel/js/theme.js') }}"></script>


</body>
</html>