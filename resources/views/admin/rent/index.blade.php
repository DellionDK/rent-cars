@extends('admin.layouts.app')
@section('title', 'Список авто')

@section('content')



    <div class="row mb-2">
        <div class="col-md-12 m-auto text-left">
            <h1 class="display-5 mb-3">Список авто <a href="{{ route('admin.rent.cars.add') }}" class="btn btn-success">Добавить авто</a></h1>

            @if(session()->has('message'))
                <div class="alert alert-success py-2">
                    {{ session()->get('message') }}
                </div>
            @endif

            <form action="{{ route('admin.rent.cars') }}" method="GET" id="searchForm">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Поиск по ID или названию" id="search" name="search" />
                </div>
            </form>
        </div>


    </div>

    <div class="rent-list row">

        @if(count($cars) > 0)
            @foreach($cars as $car)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($car->preview) }}" class="card-img-top" alt="{{ $car->brand }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->brand }} <span class="text-small text-muted d-block">ID #{{ $car->id }}</span></h5>
                            <a href="{{ route('admin.rent.cars.edit', ['car' => $car->id]) }}" class="btn btn-primary">Редактировать</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

@endsection