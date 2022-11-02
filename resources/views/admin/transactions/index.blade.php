@extends('admin.layouts.app')
@section('title', 'Заказы и расчёты')

@section('content')

    <div class="row mb-2">
        <div class="col-md-12 m-auto text-left">
            <h1 class="display-5 mb-3">История бронирований</h1>
        </div>
    </div>

    <form action="{{ route('admin.transactions.index') }}" method="GET" id="searchForm">
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" placeholder="Поиск по номеру, имени, авто" id="search" name="search" />
        </div>
    </form>

    <div class="card-list">

        @if(count($orders) > 0)
            @foreach($orders as $order)
                <div class="card card-task @if($order->type == "calculate") bg-light @endif">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 data-filter-by="text" class="H6-filter-by-text">
                                {{ $order->name }}
                                <span class="text-small text-muted">Телефон: <b>{{ $order->phone }}</b></span>
                            </h6>
                            <span class="text-small">Авто: <b>{{ $order->order }}</b></span>
                        </div>
                        <div class="card-meta">
                            <div class="text-muted mr-5 text-left">
                                <span class="text-small">Сумма: <b>{{ $order->amount }}</b></span>
                            </div>
                            <div class="text-muted mr-5 text-left">
                                <span class="text-small">Статус: <b class="text-bold">{{ $order->status === "paid" ? "Оплачено" : "Не оплачено" }}</b></span>
                            </div>
                            <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="task-dropdown-button-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#comments-{{ $order->id }}">Комментарий к заказу</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.layouts.components.modals.comments', ['id' => $order->id, 'comment' => $order->comment])
            @endforeach
        @else
            <h5 class="py-5 text-center text-muted">История бронирований пуста..</h5>
        @endif


    </div>



@endsection


