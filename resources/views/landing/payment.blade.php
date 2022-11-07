@extends('landing.layouts.payment')
@section('content')


<div id="checkout">
    @csrf
    <div id="checkout-container"></div>
</div>


{{--
    <script>



        function checkoutInit(url) {
            $ipsp('checkout').scope(function() {
                this.setCheckoutWrapper('#checkout_wrapper');
                this.addCallback(__DEFAULTCALLBACK__);
                this.action('show', function(data) {
                    $('#checkout_loader').remove();
                    $('#checkout').show();
                });
                this.action('hide', function(data) {
                    $('#checkout').hide();
                });
                this.action('resize', function(data) {
                    $('#checkout_wrapper').width(480).height(data.height);
                });
                this.loadUrl(url);
            });
        };


        let searchParams = new URLSearchParams(window.location.search);
        let amount = searchParams.get("amount");
        var button = $ipsp.get("button");
        button.setMerchantId(1396424);
        button.setResponseUrl('https://arenda-mercedes.kiev.ua/payment/' + searchParams.get("data") + '/success');
        button.setAmount(amount, 'UAH', true);
        button.setHost('pay.fondy.eu');
        checkoutInit(button.getUrl());
    </script>
--}}

<script>

    let searchParams = new URLSearchParams(window.location.search);
    let amount = searchParams.get("amount");
    var Options = {
        options: {
            methods: ['card', 'banklinks_eu', 'wallets', 'local_methods'],
            methods_disabled: [],
            card_icons: ['mastercard', 'visa', 'maestro'],
            active_tab: 'card',
            fields: false,
            title: 'Arenda Mercedes',
            link: 'https://arenda-mercedes.kiev.ua',
            full_screen: true,
            button: true,
            email: true,
            theme: { type: "dark", preset: "vibrant_gold" }
        },
        params: {
            merchant_id: 1499335,
            required_rectoken: 'y',
            currency: 'UAH',
            amount: Number(amount) * 100,
            order_desc: 'Pay for the booking'
        }
    }
    var app = fondy("#checkout-container", Options)
        .$on("success", function(model) {
            console.log("success event handled");
            var order_status = model.attr("order.order_data.order_status");

            if (order_status == "approved") {
                fetch('https://arenda-mercedes.kiev.ua/payment/' + searchParams.get("data") + '/success');
                console.log("Order is approved. Do somethng on approve...");
                setInterval(() => {
                    window.location.href = "/";
                }, 3000)
            }
        })
        .$on("error", function(model) {
            console.log("error event handled");
            var response_code = model.attr("error.code");
            var response_description = model.attr("error.message");
            console.log(
                "Order is declined: " +
                response_code +
                ", description: " +
                response_description
            );
        });


    setInterval(() => {
        document.querySelector('.f-logo').remove()
        document.querySelector('.f-header-logo').innerHTML = "<div class='f-logo'><img src='https://arenda-mercedes.kiev.ua/assets/landing/arenda-mercedes_en.png' width='240px'></div>"
    }, 10)
</script>

    @endsection