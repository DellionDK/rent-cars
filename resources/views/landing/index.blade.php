@extends('landing.layouts.app')
@section('preview_image', asset('/assets/landing/logo.webp'))

@if(app()->getLocale() == "en")
@section('title', 'Rent Mercedes (Kiev) Rent with or without driver | arenda-mercedes.kiev.ua')
@section('description', 'Rent a Mercedes in Kiev and the region ✅ All classes Mercedes V, G, E, S-class ✅ Rent with a driver and without ✅ Car supply 100% ✅ VIP service 24/7 ✅ English-speaking drivers ⭐Favorable prices ➢Order ☎ 067 708-50-88')
@section('keywords', 'rent a Mercedes, rent a Mercedes s, rent a mercedes, rent a Mercedes with a driver, rent a Mercedes, rent a mercedes, order a Mercedes, a Mercedes for a wedding, a Mercedes wedding, rent a Mercedes for a wedding, a white Mercedes, a white Mercedes for a wedding, order a Mercedes for a wedding, a Mercedes 222 for a wedding, rent a Mercedes for a wedding, a Mercedes sprinter for a wedding, a Mercedes car for a wedding, rent a Mercedes 222 with a driver, rent a Mercedes 221 with a driver, rent a Mercedes 222, rent a Mercedes 221, rent a Mercedes sprinter, a Mercedes taxi, a Mercedes taxi, Chauffeur services, Chauffeur driven Mercedes, Car for hire, mercedes rental, rent mercedes, hire a mercedes, mercedes for rent, order mercedes, white mercedes, mercedes wedding, mercedes taxi, Rent Mercedes sprinter, airport transfer')
@else
@section('title', 'Аренда Mercedes (Киев) Прокат с водителем и без | arenda-mercedes.kiev.ua')
@section('description', 'Аренда Mercedes Киев и обл ✅ Все классы Мерседес V,G,E, S-class ✅ Прокат с водителем и без ✅ Подача авто 100% ✅ VIP сервис 24/7 ✅ Англоговорящие водители ⭐Выгодные цены ➢Заказать ☎ 067 708-50-88')
@section('keywords', 'аренда мерседеса, аренда мерседеса, аренда мерседеса, аренда мерседеса с водителем, аренда мерседеса, аренда мерседеса, заказать мерседес, мерседес на свадьбу, мерседес на свадьбу, аренда мерседеса на свадьбу, белый мерседес, белый мерседес на свадьбу, заказать мерседес на свадьбу, мерседес 222 на свадьбу, аренда мерседес на свадьбу, мерседес спринтер на свадьбу, автомобиль мерседес на свадьбу, аренда мерседес 222 с водитель, аренда мерседес 221 с водителем, аренда мерседес 222, аренда мерседес 221, аренда мерседес спринтер, мерседес такси, мерседес такси, услуги шофера, мерседес с водителем, прокат автомобилей, аренда мерседес, аренда мерседес , аренда мерседеса, аренда мерседеса, заказ мерседеса, белый мерседес, мерседес свадьба, мерседес такси, Аренда мерседес спринтер, трансфер из аэропорта')
@endif

@section('content')


<section id="about">
    <div class="about_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 about">
                    <h2 class="text-center black">{{ __('О нас') }}</h2>
                    <p>{!! __('Наша компания специализируется на аренде автомобилей марки Mercedes-Benz. Мы предоставляем полный спектр услуг по аренде автомобилей с водителем и без водителя. В автопарке представлены легковые машины, внедорожники, минивэны и микроавтобусы всемирно известной марки. Это позволяет нам обслуживать различные заказы на самом высоком уровне. <strong>Наша миссия:</strong> Дать Вам Абсолютный Комфорт в Дороге! Именно поэтому наша компания предоставляет в аренду автомобили марки Mercedes-Benz.') !!}</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2">
                    <hr style="width: 185px">
                    <h2 class="text-center black">{{ __('Почему стоит заказать у нас?') }}</h2>
                    <hr style="width: 100px">
                </div>
                <div class="block col-xs-12">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="block_li row">
                                <div class="col-sm-6 li_left">
                                    <ul>
                                        <li>{{ __('Крупнейший автопарк') }}</li>
                                        <li>{{ __('Исключительно MERCEDES') }}</li>
                                        <li>{{ __('Аренда с водителем и без водителя') }}</li>
                                        <li>{{ __('Опыт работы более 10 лет') }}</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 li_right">
                                    <ul>
                                        <li>{{ __('Работаем без выходных') }}</li>
                                        <li>{{ __('Удобные способы оплаты') }}</li>
                                        <li>{{ __('Выгодные цены') }}</li>
                                        <li>{{ __('Более 1000 довольных клиентов') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="block_how hidden visible-lg"></div>
                    </div>
                </div>
                <div class="col-lg-8 col-lg-offset-2 mission">
                    <!-- <p><strong>Наша миссия:</strong> Дать Вам Абсолютный Комфорт в Дороге!</p> -->
                    <!-- <p><strong>Именно поэтому наша компания предоставляет в аренду автомобили марки Mercedes-Benz.</strong></p> -->
                    <p><strong>{{ __('При необходимости Вас будут обслуживать водители со знанием английского языка.') }}</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>



<section id="gallery">

    <div class="gallery_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center block_cars">
                    <div class="video_wrap">
                        <video preload="none" src="{{ asset('/assets/landing/(Промо-ролик) arenda-mercedes.kiev.ua.m4v') }}" controls="" poster="{{ asset('assets/landing/video.webp') }}"></video>
                    </div>
                    <h2 class="white">{{ __('Автопарк') }}</h2>
                    @if(count($categories) > 0)
                    <nav class="menu_cars">
                        <button class="filter current active" data-filter="all">{{ __('Все') }}</button>
                        @foreach($categories as $category)
                        <button class="filter filt" data-filter=".category-{{ $category->id }}">
                            <!-- {{ session()->get('locale') == "ru" ? $category->name : $category->name_en  }} -->

                            @switch(session()->get('locale'))
                            @case('en')
                                {{ $category->name_en }}
                            @break

                            @case('ua')
                            {{ $category->name_ua }}
                            @break

                            @default
                                {{ $category->name }}
                            @endswitch
                        </button>
                        @endforeach
                    </nav>
                    @endif
                </div>
            </div>
        </div>


        @include('landing.components.cars_card', ['cars' => $cars])



        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center more">
                    <button class="showmore" onclick="loadcars()">{{ __('Показать еще') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadcars() {
            const url = window.location.href;
            let reg = /\/en/i;
            let language = "ru";

            if (reg.test(url)) {
                language = "en";
            }

            const xhr = new XMLHttpRequest();
            xhr.onload = () => {
                if (xhr.status == 200) {
                    const cars = xhr.response
                    $(".container-fluid.cars-list").after(cars);
                    $(".container-fluid.cars-list")[0].remove();
                    window.location.href = "#card_centered";
                    $('.catalog_img_item').height($('.mix').width() - 35);
                } else {
                    console.error('Error!');
                }
            };
            xhr.open('GET', '/api/load-cars?language=' + language);
            xhr.send();
        }
    </script>


    <div class="job_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 job_wrap">
                    <h2 class="text-center">{{ __('Как мы работаем') }}</h2>
                    <div class="col-sm-3 jobs">
                        <img src="{{ asset('/assets/landing/images/job1.webp') }}" class="lazyload" alt="">
                        <p>{{ __('Прием звонка или заявки через электронную почту') }}</p>
                    </div>

                    <div class="col-sm-3 jobs">
                        <img class="lazyload" data-src="{{ asset('/assets/landing/images/job2.webp') }}" alt="" src="{{ asset('/assets/landing/images/job2.webp') }}">
                        <p>{{ __('Уточнение деталей и прием предоплаты') }}</p>
                    </div>

                    <div class="col-sm-3 jobs">
                        <img class="lazyload" data-src="{{ asset('/assets/landing/images/job3.webp') }}" alt="" src="{{ asset('/assets/landing/images/job3.webp') }}">
                        <p>{{ __('Качественное обслуживание мероприятия') }}</p>
                    </div>
                    <div class="col-sm-2 jobs">
                        <img class="lazyload" data-src="{{ asset('/assets/landing/images/job4.webp') }}" alt="" src="{{ asset('/assets/landing/images/job4.webp') }}">
                        <p>{{ __('Окончательный расчет') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="faq_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 faq_wrap">
                    <h2 class="text-center white">{{ __('часто задаваемые вопросы') }}</h2>
                    <table>
                        <tbody>
                            <tr>
                                <td class="left"><img class="lazyload" data-src="{{ asset('/assets/landing/images/faq_img.webp') }}" alt="" src="{{ asset('/assets/landing/images/faq_img.webp') }}"></td>
                                <td class="right">{!! __('<span>У вас можно арендовать Мерседес с водителем и без?</span><br> Да, Вы можете заказать почасовую аренду машины с профессиональным водителем, а также взять посуточно в аренду без водителя.') !!}</td>
                            </tr>
                            <tr>
                                <td class="left"><img class="lazyload" data-src="{{ asset('/assets/landing/images/faq_img.webp') }}" alt="" src="{{ asset('/assets/landing/images/faq_img.webp') }}"></td>
                                <td class="right">{!! __('<span>Что такое +1 час за подачу автомобиля?</span><br> Это 30 минут автомобиль едет к Вам на адрес и 30 минут после заказа возвращается в гараж.') !!}
                                </td>
                            </tr>
                            <tr>
                                <td class="left"><img class="lazyload" data-src="{{ asset('/assets/landing/images/faq_img.webp') }}" alt="" src="{{ asset('/assets/landing/images/faq_img.webp') }}"></td>
                                <td class="right">{!! __('<span>Какое минимальное количество часов аренды?</span><br> С понедельника по четверг - 3 часа. Пятница, суббота - 5 часов. Воскресенье - 4 часа.') !!}
                                </td>
                            </tr>
                            <tr>
                                <td class="left"><img class="lazyload" data-src="{{ asset('/assets/landing/images/faq_img.webp') }}" alt="" src="{{ asset('/assets/landing/images/faq_img.webp') }}"></td>
                                <td class="right">{!! __('<span>Выезд из Киева оплачивается дополнительно?</span><br> Выезд из Киева до 20 км оплачивается: плюс один час к стоимости аренды, свыше 20 км оплачивается общий километраж в две стороны.') !!}
                                </td>
                            </tr>
                            <tr>
                                <td class="left"><img class="lazyload" data-src="{{ asset('/assets/landing/images/faq_img.webp') }}" alt="" src="{{ asset('/assets/landing/images/faq_img.webp') }}"></td>
                                <td class="right">{!! __('<span>Машина подаётся чистая?</span><br> Автомобиль приезжает на заказ после автомойки (комплексная мойка автомобиля).') !!}
                                </td>
                            </tr>

                            <tr>
                                <td class="left"><img class="lazyload" data-src="{{ asset('/assets/landing/images/faq_img.webp') }}" alt="" src="{{ asset('/assets/landing/images/faq_img.webp') }}"></td>
                                <td class="right">{!! __('<span>Машина будет вовремя?</span><br> Автомобиль приезжает на указанный адрес за 10 минут до заказа.') !!}
                                </td>
                            </tr>
                            <tr>
                                <td class="left"><img class="lazyload" data-src="{{ asset('/assets/landing/images/faq_img.webp') }}" alt="" src="{{ asset('/assets/landing/images/faq_img.webp') }}"></td>
                                <td class="right">{!! __('<span>Какие у Вас водители?</span><br> В нашей компании работают только профессионалы с опытом работы<span><br></span> в с сфере обслуживания VIP клиентов.') !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>



<section id="reviews">
    <div class="review_bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 review_wrap">
                    <h2 class="black text-center">{{ __('Отзывы') }}</h2>
                    <div class="owl-carousel owl-theme">
                        <div><img src="{{ asset('/assets/companies/Pari.svg') }}" class="logo-company" alt="">
                        </div>
                        <div><img src="{{ asset('assets/companies/Panasonic_logo_(Blue)1.svg') }}" class="logo-company" alt="">
                        </div>
                        <div><img src="{{ asset('assets/companies/intercontinental-hotel-logo.png') }}" class="logo-company" alt="" style="width: 250px!important; height: 100px;margin-top: 20px;">
                        </div>
                        <div><img src="{{ asset('/assets/companies/Huawei_Standard_logo1.svg') }}" class="logo-company" alt="">
                        </div>
                        <div><img src="{{ asset('/assets/companies/HiltonHotelsLogo1.svg') }}" class="logo-company" alt="">
                        </div>
                        <div><img src="{{ asset('/assets/companies/Fairmont.svg') }}" class="logo-company" alt="">
                        </div>
                        <div><img src="{{ asset('/assets/companies/UEFA-Champions-logo.png') }}" class="logo-company" alt="" style=" width: 100px!important;height: 100px;margin-top: 20px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('landing.components.contacts')


@include('landing.components.footer')


@include('landing.components.modals.call')

@endsection