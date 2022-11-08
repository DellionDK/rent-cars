<header>
    <!-- Меню navbar -->
    <nav class="navbar navbar-default navbar-fixed-top compensate-for-scrollbar">
        <div class="container container_menu">
            <!-- Бренд и переключатель, который вызывает меню на мобильных устройствах -->
            <div class="navbar-header">
                <!-- Кнопка с полосочками, которая открывает меню на мобильных устройствах -->
                <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button> -->
                <div class="window hidden visible-xs">
                    <div class="header">
                        <div class="burger-container">
                            <div id="burger">
                                <div class="bar topBar"></div>
                                <div class="bar btmBar"></div>
                            </div>
                        </div>
                        <div class="icon icon-apple">
                            <img class="img-responsive" src="{{ asset('assets/landing/arenda-mercedes_'.session()->get('locale').'.png') }}" alt="">
                        </div>
                        <ul class="menu">
                            <li class="menu-item"><a href="{{ route('landing.index.'.session()->get('locale')) }}#main">{{ __('Главная') }}</a></li>
                            <li class="menu-item"><a href="{{ route('landing.index.'.session()->get('locale')) }}#about">{{ __('О компании') }}</a></li>
                            <li class="menu-item"><a href="{{ route('landing.index.'.session()->get('locale')) }}#gallery">{{ __('Наш автопарк') }}</a></li>
                            <li class="menu-item"><a href="{{ route('landing.index.'.session()->get('locale')) }}#reviews">{{ __('Отзывы клиентов') }}</a></li>
                            <li class="menu-item"><a href="{{ route('landing.index.'.session()->get('locale')) }}#contacts">{{ __('Контакты') }}</a></li>
                        </ul>
                        <div class="shop icon icon-bag"></div>
                    </div>
                </div>
                <!-- Бренд или логотип фирмы (обычно содержит ссылку на главную страницу) -->
                <!-- <a href="index.html" class="navbar-brand"><img src="/assets/images/logo.webp" alt="">Аренда Mercedes<br> с водителем в Киеве и области</a> -->
                <a href="{{ route('landing.index.'.session()->get('locale')) }}" class="navbar-brand"><img class="img-responsive" src="{{ asset('assets/landing/arenda-mercedes_'.session()->get('locale').'.png') }}" alt=""></a>
            </div>
            <ul class="nav navbar-nav navbar-right phones text-center hidden visible-xs">
                <li><img class="lazyload" data-src="{{ asset('assets/landing/images/head1.webp') }}" alt=""><a href="tel:+380677085088">+38 (067) 708-50-88</a></li>
                <li><img class="lazyload" data-src="{{ asset('assets/landing/images/head2.webp') }}" alt=""><a href="tel:+380737085088">+38 (073) 708-50-88</a></li>
                <li><img class="lazyload" data-src="{{ asset('assets/landing/images/head3.webp') }}" alt="">{{ __('Без выходных') }}</li>
                <li class="lang">{{ strtoupper(session()->get('locale')) }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <ul class="down">
                        <li onclick="location.href='{{ route('language.change', ['locale' => 'ua']) }}'">UA</li>
                        <li onclick="location.href='{{ route('language.change', ['locale' => 'en']) }}'">EN</li>
                        <li onclick="location.href='{{ route('language.change', ['locale' => 'ru']) }}'">RU</li>
                    </ul>
                </li>
                <li class="call"><a data-fancybox data-src="#hidden-call" href="javascript:;">{{ __('Заказать звонок') }}</a></li>
            </ul>
            <!-- Содержимое меню (коллекция навигационных ссылок, формы и др.) -->
            <div class="collapse navbar-collapse" id="main-menu">
                <!-- Список ссылок, расположенных слева -->
                <ul class="nav navbar-nav navbar-right call hidden-xs">
                    <li><a data-fancybox data-src="#hidden-call" href="javascript:;">{{ __('Заказать звонок') }}</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right phones hidden-xs">
                    <li><img src="{{ asset('assets/landing/images/head1.webp') }}" class="lazyload" alt=""><a href="tel:+380677085088">+38 (067) 708-50-88</a></li>
                    <li><img src="{{ asset('assets/landing/images/head2.webp') }}" class="lazyload" alt=""><a href="tel:+380737085088">+38 (073) 708-50-88</a></li>
                    <li><img src="{{ asset('assets/landing/images/head3.webp') }}" class="lazyload" alt="">{{ __('Без выходных') }}</li>
                    <li class="lang">{{ session()->get('locale') ? strtoupper(session()->get('locale')) : "RU" }} <i class="fa fa-angle-down" aria-hidden="true"></i>
                        <ul class="down">
                            <li onclick="location.href='{{ route('language.change', ['locale' => 'ua']) }}'">UA</li>
                            <li onclick="location.href='{{ route('language.change', ['locale' => 'en']) }}'">EN</li>
                            <li onclick="location.href='{{ route('language.change', ['locale' => 'ru']) }}'">RU</li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right navmenu navmenus">
                    <!--Элемент с классом active отображает ссылку подсвеченной -->
                    <li><a class="active" href="{{ route('landing.index.'.session()->get('locale')) }}#main">{{ __('Главная') }} <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ route('landing.index.'.session()->get('locale')) }}#about">{{ __('О компании') }}</a></li>
                    <li><a href="{{ route('landing.index.'.session()->get('locale')) }}#gallery">{{ __('Наш автопарк') }}</a></li>
                    <li><a href="{{ route('landing.index.'.session()->get('locale')) }}#reviews">{{ __('Отзывы клиентов') }}</a></li>
                    <li><a href="{{ route('landing.index.'.session()->get('locale')) }}#contacts">{{ __('Контакты') }}</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>