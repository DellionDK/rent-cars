@if(count($cars) > 0)
    <div id="Container" class="container-fluid cars-list">
        <div class="row">
            @foreach($cars as $key => $car)
                @if($key == 15)
                    <div class="hidden-block" id="card_centered"></div>
                @endif
                @php $car_categories = explode(',', $car->category_id) @endphp
                <div class=" col-md-4 col-sm-6 mix @foreach($car_categories as $c) category-{{ $c }} @endforeach" data-my-order="37" style="display: inline-block;" data-bound=""> {{--col-lg-3--}}
                    <div class="catalog_img_item lazyload card-preview" data-src="{{ asset($car->preview_main ? $car->preview_main : $car->preview) }}" style="background-position: center center; background-image: url({{ asset($car->preview) }});"></div>
                    <div class="mask">
                        <p class="car_model">{{ $car->brand_en }}</p>
                        <p class="car_year"><span class="yellow">{{ __('Year') }}:</span> {{ $car->year }}</p>
                        <p class="total_places"><span class="yellow">{{ __('Passenger seats') }}:</span> {{ $car->passenger_seats }}</p>
                        <p class="car_price"><span class="yellow">{{ __('With a driver') }}:</span> {{ $car->price_with_driver_en }} / {{ __('hour') }}</p>
                        @if($car->transfer && $car->transfer > 0)
                            <p class="filling_time"><span class="yellow">{{ __('Transfer') }}:</span> {{ $car->transfer_en }}</p>
                        @endif
                        @if($car->car_without_driver && isset(json_decode($car->rate_without_driver, true)[0]))
                            <p class="filling_time"><span class="yellow">{{ __('Without a driver') }}:</span> {{ json_decode($car->rate_without_driver, true)[0]['price'] }} / {{ __('day') }}</p>
                    @endif
                    <!-- <p class="out">Выезд за Киев- 50 грн/км.</p> -->
                        <div class="but_wrap">
                            <a class="btn-order omore" href="{{ '/En/'.$car->url }}">{{ __('see more') }}</a>
                        </div>
                    </div>
                </div>
                @include('landing.components.modals.order', ['car' => $car])
            @endforeach
            {{--<div id="more" class="hiddens">
                <div class="col-lg-3 col-md-4 col-sm-6 mix category-1" data-my-order="4" style="display: inline-block;" data-bound="">

                    <!-- <img class="img-responsive" src="./images/W221_S600L_AMG_2012_b.webp" alt=""> -->

                    <div class="catalog_img_item lazyload" data-src="./img_new/catalog_backgrounds/ГлавнаяMercedes-w221-S600-long.webp" style="background-position: right center; height: 452px;"></div>

                    <div class="mask">

                        <p class="car_model yellow">Mercedes w221 S600 Long</p>

                        <p class="car_year"><span class="yellow">Год:</span> 2012</p>

                        <p class="total_places"><span class="yellow">Пассажирских мест:</span> 4</p>

                        <p class="car_price"><span class="yellow">С водителем:</span> 600 грн/час</p>

                        <p class="filling_time">Трансфер: 2300грн</p>

                        <!-- <p class="out">Выезд за Киев- 15 грн/км.</p> -->

                        <div class="but_wrap">

                            <a class="more" href="/Ru/Mercedes_w221_S600_Long.html">подробнее</a>

                            <a class="order" data-fancybox="" data-src="#hidden-order" href="javascript:;">арендовать</a>

                        </div>

                    </div>

                </div>
            </div>--}}
        </div>
    </div>
@endif