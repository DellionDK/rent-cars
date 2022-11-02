<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" xmlns="http://www.w3.org/1999/xhtml" xml:lang="{{ app()->getLocale() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>@yield('title')</title>
<link rel="stylesheet" href="{{ asset('/assets/payment.css') }}">
<script src="https://pay.fondy.eu/latest/checkout-vue/checkout.js"></script>
    </head>
    <body>


    @yield('content')


    </body>
</html>