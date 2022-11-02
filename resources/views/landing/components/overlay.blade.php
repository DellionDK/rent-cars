<div class="slide_bg overlay">
    <video id="introVideo" width="100%" height="auto" loop="loop" autoplay="autoplay" preload="metadata" webkit-playsinline="true"
           playsinline="true" muted>
        <source src="{{ asset('assets/landing/intro.mp4') }}" />
    </video>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-4"></div>
            <div class="col-lg-6 col-md-8 main_block">
                <h1 class="yellow">{{ __('Аренда автомобилей') }}</h1>
                <div class="rent">
                    <img src="{{ asset('assets/landing/images/logo2.webp') }}" class="lazyload" alt="">
                    <p class="white">Mercedes-Benz</p>
                </div>
                <div class="clearfix"></div>
                <p class="banner-p">{{ __('С водителем и без водителя') }}</p>
                <p class="yellow-p banner-p">{{ __('Самый большой парк Мерседесов в Киеве.') }}</p>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 sq_bg text-center">
                    <p>{{ __('Водители проходят') }}</p>
                    <p>{{ __('базовую медицинскую проверку') }}</p>
                </div>
                <div class="col-md-4 col-sm-6 sq_bg text-center">
                    <p>{{ __('Дезинфицируем автомобили') }}</p>
                    <p>{{ __('перед каждым заказом') }}</p>
                </div>
                <div class="col-md-4 col-sm-6 sm12 sq_bg text-center">
                    <p>{{ __('Предоставляем средства защиты') }}</p>
                    <p>{{ __('маска, перчатки, дезинфектор') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>