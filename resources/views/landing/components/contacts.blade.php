<section id="contacts">
    <div class="contacts_bg">
        <div class="container cont">
            <div class="row">
                <div class="col-md-10 col-md-offset-2 map_wrap">
                    <div class="col-xs-4 information hidden visible-xs visible-sm">
                        <table>
                            <tr>
                                <td><img class="lazyload" data-src="{{ asset('assets/landing/images/info1.webp') }}" alt=""></td>
                                <td>{{ __('Киев, проспект Мира, 15А') }}</td>
                            </tr>
                            <tr>
                                <td><img class="lazyload" data-src="{{ asset('assets/landing/images/info2.webp') }}" alt=""></td>
                                <td><a href="tel:+380677085088">+38 (067) 708-50-88</a></td>
                            </tr>
                            <tr>
                                <td><img class="lazyload" data-src="{{ asset('assets/landing/images/info3.webp') }}" alt=""></td>
                                <td><a href="tel:+380737085088">+38 (073) 708-50-88</a></td>
                            </tr>
                            <tr>
                                <td class="l_img"><img class="lazyload" data-src="{{ asset('assets/landing/images/info4.webp') }}" alt="">
                                </td>
                                <td>{!!  __('Прием заказов <br><span>без выходных</span>') !!}</td>
                            </tr>
                            <tr>
                                <td><img class="lazyload" data-src="{{ asset('assets/landing/images/info5.webp') }}" alt=""></td>
                                <td><a href="mailto:arenda.mercedes.ua@gmail.com">arenda.mercedes.ua@gmail.com</a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-xs-5 contact hidden visible-sm">
                        <h2 class="black">{{ __('обратный звонок') }}</h2>
                        <form method="post" action="{{ route('landing.form.call') }}">
                            @csrf
                            <div id="errors"></div>
                            <div class="form-group">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('Имя') }}" required>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <input id="phone" name="phone" type="tel" class="form-control" placeholder="{{ __('Телефон') }}" required>
                            </div>
                            <div class="result"></div>
                            <div class="form-group">
                                <button type="submit" class="subm">{{ __('заказать звонок') }}</button>
                            </div>
                        </form>
                    </div>

                    <div class="map" id="googleMap" style="width:100%;height:480px;"></div>

                    <div class="col-xs-4 information hidden-xs hidden-sm" itemscope
                         itemtype="https://schema.org/Organization">
                        <meta itemprop="name" content="Аренда Мерседес в Киеве"/>
                        <table>
                            <tr itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                                <td><img class="lazyload" data-src="{{ asset('assets/landing/images/info1.webp') }}" alt=""></td>
                                <td><span itemprop="streetAddress">{{ __('Киев') }}</span>, <span itemprop="streetAddress"> {{ __('проспект Мира, 15А') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td><img class="lazyload" data-src="{{ asset('assets/landing/images/info2.webp') }}" alt=""></td>
                                <td><a href="tel:+380677085088"><span
                                                itemprop="telephone">+38 (067) 708-50-88</span></a></td>
                            </tr>
                            <tr>
                                <td><img class="lazyload" data-src="{{ asset('assets/landing/images/info3.webp') }}" alt=""></td>
                                <td><a href="tel:+380737085088"><span
                                                itemprop="telephone">+38 (073) 708-50-88</span></a></td>
                            </tr>
                            <tr>
                                <td class="l_img"><img class="lazyload" data-src="{{ asset('assets/landing/images/info4.webp') }}" alt="">
                                </td>
                                <td>{!! __('Прием заказов <br><span>без выходных</span>') !!}</td>
                            </tr>
                            <tr>
                                <td><img class="lazyload" data-src="{{ asset('assets/landing/images/info5.webp') }}" alt=""></td>
                                <td><a href="mailto:arenda.mercedes.ua@gmail.com"><span itemprop="email">arenda.mercedes.ua@gmail.com</span></a>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-xs-5 contact hidden-sm">
                        <h2 class="black">{{ __('обратный звонок') }}</h2>
                        <form method="post" action="{{ route('landing.form.call') }}">
                            @csrf
                            <div id="errors"></div>
                            <div class="form-group">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('Имя') }}" required>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <input id="phone" name="phone" type="tel" class="form-control" placeholder="{{ __('Телефон') }}" required>
                            </div>
                            <div class="result"></div>
                            <div class="form-group">
                                <button type="submit" class="subm">{{ __('заказать звонок') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>