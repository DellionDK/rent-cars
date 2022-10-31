@extends('landing.layouts.car')
@section('title', session()->get('locale') == "ru" ? $car->seo_title : $car->seo_title_en)
@section('description', session()->get('locale') == "ru" ? $car->seo_description : $car->seo_description_en)
@section('keywords', $car->seo_tags)
@section('preview_title', session()->get('locale') == "ru" ? $car->brand_h1 : $car->brand_h1_en)
@section('preview_image', asset($car->preview))

@section('content')


    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li style="display: inline-block;"><a href="/#gallery">{{ __('Автопарк') }}</a></li>
                <li style="display: inline-block;">{{ session()->get('locale') == "ru" ? $car->brand : $car->brand_en }}</li>
            </ul>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 single_info">
                    @if(!empty($car->brand_h1))
                        <h1>{{  session()->get('locale') == "ru" ? $car->brand_h1 : $car->brand_h1_en }} </h1>
                    @else
                        <h1>{{  session()->get('locale') == "ru" ? $car->brand : $car->brand_en }} </h1>
                    @endif
                    <div class="row d_f">
                        <div class="col-md-7 info_left">
                            @if($car->enabled_video && isset($car->video_url))
                                <iframe  id="ytplayer" type="text/html" height="500px"  width="100%" class="img-responsive" src="{{ $car->video_url }}?version=3&autoplay=1&modestbranding=1&controls=1&muted=1&showinfo=0&rel=0&enablejsapi=1&loop=1&playsinline=0&playlist={{ substr(strrchr($car->video_url, "/"), 1)  }}"
                                         playsinline="true" muted title="YouTube video player" muted autoplay frameborder="0" style="height: 500px!important;" allow='autoplay; accelerometer; autoplay; controls; loop;'></iframe>
                            @else
                                <img class="img-responsive" id="banner-img" style="opacity: 1; height: 100%;" src="{{ asset($car->preview) }}" title="{{ $car->brand }}" alt="{{ $car->seo_tags }}">
                            @endif
                        </div>
                        <div class="col-md-5 car-inf-ad">
                            <div class="carinfo-tabs" @if(!$car->car_with_driver || !$car->car_without_driver) style="background: #161616;" @endif>
                                @if($car->car_with_driver)
                                    <div class="car-tab active" id="select_with_driver" @if(!$car->car_without_driver) style="left: 0!important;position: unset!important; border-top-right-radius: 20px; width: 100%;" @endif>{{ __('С водителем') }}</div>
                                @endif
                                @if($car->car_without_driver)
                                    <div class="car-tab car-tab-pr" id="select_without_driver">{{ __('Без водителя') }}</div>
                                @endif
                            </div>
                            <div class=" info_right">
                                <div class="with_driver_content active">

                                    <p class="car_price"><span class="yellow">{{ __('Цена аренды') }}:</span> {{ session()->get('locale') == "ru" ? $car->price_with_driver : $car->price_with_driver_en }} {{ session()->get('locale') == "ru" ? __('грн') : '' }} / {{ __('час') }}  <span class="hcar"><br>({{ __('+1 час подача авто') }})</span></p>
                                    <div class="bord"></div>

                                    @if($car->transfer && $car->transfer > 0)
                                        <p class="car_price"><span class="yellow">{{ __('Трансфер') }}:</span> {{ session()->get('locale') == "ru" ? $car->transfer : $car->transfer_en }}</p>
                                        <div class="bord"></div>
                                    @endif

                                    <p class="total_places"><span class="yellow">{{ __('Пассажирских мест') }}:</span> {{ $car->passenger_seats }}</p>
                                    <div class="bord"></div>

                                    <p class="car_year"><span class="yellow">{{ __('Год') }}:</span> {{ $car->year }}</p>
                                </div>

                                <div class="without_driver_content">
                                    @if($car->car_without_driver)
                                        <table>
                                            <tr>
                                                <th class="thead-days">{{ __('Количество дней') }}</th>
                                                <th class="thead-days">{{ array_values(json_decode($car->rate_without_driver, true))[0]['days'] }}</th>
                                                @if(isset(array_values(json_decode($car->rate_without_driver, true))[1]) && !empty(isset( array_values(json_decode($car->rate_without_driver, true))[1])))<th class="thead-days">{{ array_values(json_decode($car->rate_without_driver, true))[1]['days'] }}</th>@endif
                                                @if(isset(array_values(json_decode($car->rate_without_driver, true))[2]) && !empty(isset( array_values(json_decode($car->rate_without_driver, true))[2])))<th class="thead-days">{{ array_values(json_decode($car->rate_without_driver, true))[2]['days'] }}</th>@endif
                                            </tr>
                                            <tr>
                                                <td class="tbody-rates">{{ __('Цена за день') }}</td>
                                                <td class="tbody-rates">{{ array_values(json_decode($car->rate_without_driver, true))[0]['price'] }}</td>
                                                @if(isset(array_values(json_decode($car->rate_without_driver, true))[1]) && !empty(isset( array_values(json_decode($car->rate_without_driver, true))[1])))<td class="tbody-rates">{{ array_values(json_decode($car->rate_without_driver, true))[1]['price'] }}</td>@endif
                                                @if(isset(array_values(json_decode($car->rate_without_driver, true))[2]) && !empty(isset( array_values(json_decode($car->rate_without_driver, true))[2])))<td class="tbody-rates">{{ array_values(json_decode($car->rate_without_driver, true))[2]['price'] }}</td>@endif
                                            </tr>
                                        </table>

                                        <table style="margin-top: 20px;">
                                            <tr>
                                                <th class="thead-days">{{ __('Количество дней') }}</th>
                                                @if(isset(array_values(json_decode($car->rate_without_driver, true))[3]) && !empty(isset( array_values(json_decode($car->rate_without_driver, true))[3])))<th class="thead-days">{{ array_values(json_decode($car->rate_without_driver, true))[3]['days'] }}</th>@endif
                                                @if(isset(array_values(json_decode($car->rate_without_driver, true))[4]) && !empty(isset( array_values(json_decode($car->rate_without_driver, true))[4])))<th class="thead-days">{{ array_values(json_decode($car->rate_without_driver, true))[4]['days'] }}</th>@endif
                                                <th class="thead-days">{{ __('Залог') }}</th>
                                            </tr>
                                            <tr>
                                                <td class="tbody-rates">{{ __('Цена за день') }}</td>
                                                @if(isset( array_values(json_decode($car->rate_without_driver, true))[3]) && !empty(isset( array_values(json_decode($car->rate_without_driver, true))[3])))<td class="tbody-rates">{{ array_values(json_decode($car->rate_without_driver, true))[3]['price'] }}</td>@endif
                                                @if(isset( array_values(json_decode($car->rate_without_driver, true))[4]) && !empty(isset( array_values(json_decode($car->rate_without_driver, true))[4])))<td class="tbody-rates">{{ array_values(json_decode($car->rate_without_driver, true))[4]['price'] }}</td>@endif
                                                <td class="tbody-rates">{{ $car->pledge }}</td>
                                            </tr>
                                        </table>

                                        {{--                                   @foreach(json_decode($car->rate_without_driver) as $rate)
                                                                               @if($rate->price && $rate->days)
                                                                                   <p class="car_price"><span class="yellow">{{ $rate->days }} {{ __('сутки(ок)') }}</span> <b class="ml5">{{ $rate->price }} /{{ __('сутки') }}</b> </p>
                                                                                   <div class="bord"></div>
                                                                               @endif
                                                                           @endforeach

                                                                           @if($car->pledge && $car->pledge > 0)
                                                                               <p class="out"><span class="yellow">{{ __('Залог') }}:</span> <b class="ml5">{{ $car->pledge }}</b></p>
                                                                           @endif--}}
                                    @endif
                                </div>

                                {{--<p class="car_year"><span class="yellow">{{ __('Год') }}:</span> {{ $car->year }}</p>
                                <div class="bord"></div>
                                <p class="total_places"><span class="yellow">{{ __('Пассажирских мест') }}:</span> {{ $car->passenger_seats }}</p>
                                <div class="bord"></div>
                                @if($car->car_with_driver)
                                    <p class="car_price"><span class="yellow">{{ __('С водителем') }}:</span> {{ session()->get('locale') == "ru" ? $car->price_with_driver : $car->price_with_driver_en }} / {{ __('час') }}  <span class="hcar"><br>({{ __('+1 час подача авто') }})</span></p>
                                    <div class="bord"></div>
                                @endif

                                @if($car->car_without_driver && !empty($car->rate_without_driver))
                                    <p class="filling_time">{{ __('Без водителя') }}: {{ json_decode($car->rate_without_driver, true)[0]['price'] }} @if(json_decode($car->rate_without_driver, true)[0]['days']) / {{ json_decode($car->rate_without_driver, true)[0]['days'] }} {{ __('сутки(ок)') }}@endif</p>
                                @endif

                                @if($car->transfer && $car->transfer > 0)
                                    <p class="out">{{ __('Трансфер') }}: {{ session()->get('locale') == "ru" ? $car->transfer : $car->transfer_en }}</p>
                                @endif
                                @if($car->pledge && $car->pledge > 0)
                                    <p class="out">{{ __('Залог') }}: {{ $car->pledge }}</p>
                                @endif--}}
                                <div class="content-footer1">
                                    <div class="row btn-top">
                                        <div class="col-lg-6 col-md-6 col-sm-12 but_wrap card-auto" style="margin-bottom: 0px">
                                            <a class="calculate" data-fancybox="" data-src="#hidden-calculate" href="javascript:;">{{ __('расcчитать') }}</a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 but_wrap card-auto" style="margin-bottom: 0px">
                                            <a class="order" data-fancybox="" data-src="#hidden-order{{ $car->id }}" href="javascript:;">{{ __('арендовать') }}</a>
                                        </div>

                                    </div>

                                    <div class="row btn-down">
                                        <div class="col-lg-7 col-md-6 col-sm-12 left-btn" >
                                            <a class="payment" data-fancybox="" data-src="#hidden-payment{{ $car->id }}" href="javascript:;">{{ __('оплатить бронь') }}</a>
                                        </div>
                                        <div class="col-lg-4 col-md-6 right-btn">
                                            <img src="{{ asset('/assets/card1.png') }}" width="100%">
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex garanty">
                                        <img src="{{ asset('/assets/card.png') }}" width="40px" style="vertical-align: middle;">
                                        <span style="color: #fff; font-size: 14px;">{{ __('Мы гарантируем безопасность оплаты') }}</span>
                                    </div>
                                    <div class="row mob-garanty safe-block">
                                        <div class="col-md-12 d-flex text-center">
                                            <img src="{{ asset('/assets/card.png') }}" width="40px" style="vertical-align: sub;">
                                            <img src="{{ asset('/assets/card1.png') }}" width="80px">
                                        </div>
                                        <div class="col-md-12 d-flex text-center" style="margin-top: 10px;">
                                            <span class="safety" style="color: #fff; font-size: 14px;">{{ __('Мы гарантируем безопасность оплаты') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="content-footer2">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 but_wrap card-auto" style="margin-bottom: 0px">
                                            <a class="order" data-fancybox="" data-src="#hidden-order-without{{ $car->id }}" href="javascript:;">{{ __('арендовать') }}</a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12 but_wrap card-auto text-right" style="margin-bottom: 0px">
                                            <a class="calculate" data-fancybox="" data-src="#hidden-payment{{ $car->id }}" href="javascript:;">{{ __('оплатить бронь') }}</a>
                                        </div>
                                    </div>

                                    <div class="row safe-block">
                                        <div class="col-md-12 d-flex text-center">
                                            <img src="{{ asset('/assets/card.png') }}" width="40px" style="vertical-align: sub;">
                                            <img src="{{ asset('/assets/card1.png') }}" width="80px">
                                        </div>
                                        <div class="col-md-12 d-flex text-center" style="margin-top: 10px;">
                                            <span class="safety" style="color: #fff; font-size: 14px;">{{ __('Мы гарантируем безопасность оплаты') }}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 descr">
                    <h4>{{ __('Описание') }}</h4>
                    <div class="row">
                        <div class="col-sm-6 mobhar">
                            <ul style="">
                                <li><strong>{{ __('Xарактеристики') }}:</strong></li>
                                <li>{{ __('Длина, мм') }}: {{ $car->length }}</li>
                                <li>{{ __('Ширина, мм') }}: {{ $car->width }}</li>
                                <li>{{ __('Высота, мм') }}: {{ $car->height }}</li>
                                <li>{{ __('Масса, кг') }}: {{ $car->weight }}</li>
                                <li>{{ __('Багажник, л.') }}: {{ $car->trunk }}</li>
                                <li>{{ __('Двигатель объем, л.') }}: {{ $car->engine_volume }} </li>
                                <li>{{ __('Мощность, л.с.') }}: {{ $car->power }}</li>
                                <li>{{ __('Максимальная скорость, км/ч') }}: {{ $car->maximum_speed }}</li>
                                <li>{{ __('Время разгона до 100 км/ч, с') }}: {{ $car->acceleration_time }}</li>
                            </ul>
                        </div>
                        <div class="col-sm-6 mob">
                            <ul style="">
                                <li><strong>{{ __('Особенности') }}:</strong></li>
                                @foreach(explode(PHP_EOL, session()->get('locale') == "ru" ? $car->peculiarities : $car->peculiarities_en) as $p)
                                    <li>{{ $p }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cat_gal d_f2">
                @if(isset($car->gallery))



                    @foreach(json_decode($car->gallery) as $gallery)
                        @if(isset($gallery->image) && is_string($gallery->image))
                            <div class="col-md-4 col-sm-6 fancybox-thumb">
                                <a class="fancybox-thumb" rel="fancybox-thumb" href="{{ asset($gallery->image) }}" title="{{ $gallery->seo_alt }}">
                                    <img class="img-responsive" src="{{ asset($gallery->image) }}" title="{{ $car->brand }}" alt="{{ $gallery->seo_alt }}">
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="seotx">
                <pre class="description">{{{ session()->get('locale') == "ru" ? $car->description : $car->description_en }}}</pre>
            </div>
        </div>
    </section>





    <section id="gallery">

        <div class="gallery_bg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center block_cars">
                        <h2 class="white">{{ __('ВЫ МОЖЕТЕ ПОСМОТРЕТЬ ДРУГИЕ АВТО') }}</h2>
                        @if(count($categories) > 0)
                            <nav class="menu_cars">
                                <button class="filter current active" data-filter="all">{{ __('Все') }}</button>
                                @foreach($categories as $category)
                                    <button class="filter filt" data-filter=".category-{{ $category->id }}">{{ session()->get('locale') == "ru" ? $category->name : $category->name_en }}</button>
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
                        <button onclick="loadcars()">{{ __('Показать еще') }}</button>
                    </div>
                </div>
            </div>

            <script>
                $(".content-footer1").show();
                $(".content-footer2").hide();

                const url = window.location.href;
                let reg = /\/en/i;
                let language = "ru";

                if(reg.test(url)) {
                    language = "en";
                }

                function loadcars() {
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

        </div>
    </section>


    @include('landing.components.modals.call')
    @include('landing.components.modals.order', ['car' => $car])
    @include('landing.components.modals.order_without_driver', ['car' => $car])
    @include('landing.components.modals.calculate', ['carName' => $car->brand])
    @include('landing.components.modals.payment', ['car' => $car])



    @include('landing.components.contacts')


    @include('landing.components.footer')

@endsection