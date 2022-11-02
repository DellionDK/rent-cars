@extends('admin.layouts.auth')
@section('title', 'Вход в кабинет Администратора')

@section('content')

    <form action="{{ route('admin.auth.login') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <h2 class="display-5">Вход в кабинет</h2>
                <div class="errors" id="errors"></div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Введите ваш E-mail" />
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Введите ваш пароль" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-block" >Авторизоваться</button>
                </div>
            </div>
        </div>
    </form>

@endsection