<div id="map"></div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8 footer_menu">
                <ul class="fnavmenu">
                    <li><a href="/{{ session()->get('locale') == "en" ? "En" : "" }}#main">{{ __('Главная') }} <span class="sr-only">(current)</span></a></li>
                    <li><a href="/{{ session()->get('locale') == "en" ? "En" : "" }}#about">{{ __('О компании') }}</a></li>
                    <li><a href="/{{ session()->get('locale') == "en" ? "En" : "" }}#gallery">{{ __('Наш автопарк') }}</a></li>
                    <li><a href="/{{ session()->get('locale') == "en" ? "En" : "" }}#reviews">{{ __('Отзывы клиентов') }}</a></li>
                    <li><a class="active" href="/{{ session()->get('locale') == "en" ? "En" : "" }}#contacts">{{ __('Контакты') }}</a></li>
                    <li><a href="{{ route('landing.contract.'.app()->getLocale()) }}">{{ __('Договор') }}</a></li>
                </ul>
                <p>2013-2022 © {{ __('Аренда автомобилей Mercedes-Benz (Киев, Украина). Все права защищены.') }}</p>
            </div>
            <div class="col-md-4 footer_social">
                <ul>
                    <li><noindex><a href="https://www.facebook.com/arenda.mercedes.ua" target="_blank" rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i></a></noindex></li>
                    <li><noindex><a href="https://www.instagram.com/arenda.mercedes.ua/" target="_blank" rel="nofollow"><i class="fa fa-instagram" aria-hidden="true"></i></a></noindex></li>
                    <li><noindex><a href="https://www.youtube.com/channel/UC763v7-WcBSHLcQeEZ4cE4Q" target="_blank" rel="nofollow"><i class="fa fa-youtube" aria-hidden="true"></i></a></noindex></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script>
    function initMap() {
        var element = document.getElementById('googleMap');
        var options = {
            zoom: 15,
            center: {"lat":50.44505796625154,"lng":30.61476269325407},
        };

        var myMap = new google.maps.Map(element, options);

        var markers = [
            {
                coordinates: {"lat":50.44505796625154,"lng":30.61476269325407},
                info: 'проспект Миру 15, Київ, Украина, 02000'
            }
        ];

        for(var i = 0; i < markers.length; i++) {
            addMarker(markers[i]);
        }

        function addMarker(properties) {
            var marker = new google.maps.Marker({
                position: properties.coordinates,
                map: myMap
            });

            if(properties.image) {
                marker.setIcon(properties.image);
            }

            if(properties.info) {
                var InfoWindow = new google.maps.InfoWindow({
                    content: properties.info
                });

                marker.addListener('click', function(){
                    InfoWindow.open(myMap, marker);
                });
            }
        }
    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkfLxsyHe8R3zeIeYPTvDpqPAwIyX0wAQ&language=ru&region=RU?27364999&callback=initMap">
</script>