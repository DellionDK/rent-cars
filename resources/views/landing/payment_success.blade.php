@extends('landing.layouts.car')
@section('title', 'Аренда Mercedes (Киев) Прокат с водителем и без | arenda-mercedes.kiev.ua')

@section('content')

    <section>
        <div class="contr">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 block404">
                        <div class="text-center tor">
                            <p class="t1 yellow">{{ __('Спасибо!') }}</p>
                            <p class="t2">{{ __('Ваша предоплата прошла успешно!') }}
                                <br>
                                {{ __('Администратор с вами свяжется в ближайшее время.') }}</p>
                            <div class="but">
                                <p><a class="but1" href="/">{{ __('На главную') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-100058989-1', 'auto');
        ga('send', {
            hitType: 'event',
            eventCategory: 'pageview',
            eventAction: 'ThankYouPage',
        });

    </script>



    <script>
        (function(w,d,u){
            var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
            var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn.bitrix24.ua/b6724007/crm/site_button/loader_4_a9qusc.js');
    </script>

    <script type="text/javascript">
        const emitClickEventToGA = () => {
            ga('send', {
                hitType: 'event',
                eventCategory: 'nomer',
                eventAction: 'button',
            });
        }

        document.addEventListener("DOMContentLoaded", function(event) {
            document.querySelectorAll('.phones > li > a').forEach((node, index) => {
                if (index === 2) return;
                node.addEventListener('click', emitClickEventToGA)
            });
        });

    </script>

    <script type="text/javascript">
        (function(d, w, s) {
            var widgetHash = 'ntk6xd7108acwy70agzq', ctw = d.createElement(s); ctw.type = 'text/javascript'; ctw.async = true;
            ctw.src = '//widgets.binotel.com/calltracking/widgets/'+ widgetHash +'.js';
            var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(ctw, sn);
        })(document, window, 'script');
    </script>

    </html>

@endsection