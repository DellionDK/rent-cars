<div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">

    <a class="navbar-brand" href="#">
        <img alt="Pipeline" src="{{ asset('assets/admin-panel/images/logo.svg') }}">
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-block d-lg-none ml-2">
            <div class="dropdown">
                <a href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <img alt="Image" src="{{ asset('assets/admin-panel/images/user.jpg') }}"
                         class="avatar">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">Профиль</a>
                    <a href="{{ route('admin.auth.logout') }}" class="dropdown-item">Выйти</a>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
        <ul class="navbar-nav d-lg-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">Главная</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse"
                   aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2">Аренда</a>
                <div id="submenu-2" class="collapse">
                    <ul class="nav nav-small flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.rent.cars.add') }}">Добавить авто</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.rent.cars') }}">Список авто</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse"
                   aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">Категории</a>
                <div id="submenu-3" class="collapse">
                    <ul class="nav nav-small flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.categories.add') }}">Добавить категорию</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.categories') }}">Список категорий</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.orders') }}">Заказы и расчёты</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.calls') }}">Обратные звонки</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.admins.index') }}">Список администраторов</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.transactions.index') }}">История бронирований</a>
            </li>
        </ul>
    </div>
    <div class="d-none d-lg-block">
        <div class="dropup">
            <a href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img alt="Image" src="{{ asset('assets/admin-panel/images/user.jpg') }}"
                     class="avatar">
            </a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Профиль</a>
                <a href="{{ route('admin.auth.logout') }}" class="dropdown-item">Выйти</a>
            </div>
        </div>
    </div>

</div>