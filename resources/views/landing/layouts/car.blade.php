<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="Keywords" content="@yield('keywords')">
    <meta name="yandex-verification" content="589af4a29aa8428f" />
    <meta name="google-site-verification" content="H-KhQR-HE-5qkxPc3O19fJqSFahNANwqpxGKF_HyR0I" />
    <meta property="og:title" content="@yield('preview_title')">
    <meta property="og:image" content="@yield('preview_image')">

    <link href="{{ asset('/assets/landing/bootstrap/bootstrap.min.css') }}" rel="stylesheet" as="style" onload="this.rel='stylesheet'">
    @include('landing.components.partials.styles')
    @include('landing.components.partials.header_scripts')
    @if(session()->get('locale') == "ru")
        <script src="//code-eu1.jivosite.com/widget/TDdhjmlOeW" async></script>
    @else
        <script src="//code-eu1.jivosite.com/widget/0bS9HO0nh1" async></script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" rel="stylesheet">
</head>
<body>
<section id="main">

    @include('landing.components.header')

</section>

@yield('content')

@include('landing.components.partials.scripts')
</body>
</html>