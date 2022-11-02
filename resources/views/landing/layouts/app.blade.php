<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="yandex-verification" content="589af4a29aa8428f" />
    <meta name="google-site-verification" content="H-KhQR-HE-5qkxPc3O19fJqSFahNANwqpxGKF_HyR0I" />
    <meta property="og:title" content="@yield('title')">
    <meta property="og:image" content="@yield('preview_image')">

    @include('landing.components.partials.styles')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @include('landing.components.partials.header_scripts')
    @if(session()->get('locale') == "ru")
        <script src="//code-eu1.jivosite.com/widget/TDdhjmlOeW" async></script>
    @else
        <script src="//code-eu1.jivosite.com/widget/0bS9HO0nh1" async></script>
    @endif
</head>
<body>
<section id="main">

    @include('landing.components.header')

    @include('landing.components.overlay')

</section>

@yield('content')

@include('landing.components.partials.scripts')
</body>
</html>