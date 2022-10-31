@extends('admin.layouts.app')
@section('title', 'Заказы и расчёты')

@section('content')

    <div class="row mb-2">
        <div class="col-md-12 m-auto text-left">
            <h1 class="display-5 mb-3">Заказы и расчёты</h1>
        </div>
    </div>

    <div class="card-list">

        @if(count($orders) > 0)
            @foreach($orders as $order)
                <div class="card card-task @if($order->type == "calculate") bg-light @endif">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 data-filter-by="text" class="H6-filter-by-text">
                                {{ $order->name }}
                                <span class="text-small text-muted">(E-mail: <b>{{ $order->email }}</b> / Телефон: <b>{{ $order->phone }}</b>)</span>
                            </h6>
                            <span class="text-small">Заказ: <b>{{ $order->car }}</b></span>
                        </div>
                        <div class="card-meta">
                            <div class="text-muted mr-5 text-left">
                                <span class="text-small">Дата: <b>{{ $order->date }}</b></span>
                                @if(isset($order->time))
                                    <span class="text-small d-block">Время: <b>{{ $order->time }}</b></span>
                                @endif
                            </div>
                            <div class="text-muted ml-5 text-left">
                                <span class="text-small"><b>@if($order->driver) С водителем @else Без водителя @endif</b></span>
                                @if(isset($order->time))
                                    <span class="text-small d-block">Тип: <b>@if($order->type == "order") Заказ @else Расчёт @endif</b></span>
                                @endif
                            </div>
                            <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="task-dropdown-button-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#comments-{{ $order->id }}">Комментарий к заказу</a>
                                    <a class="dropdown-item text-danger" href="{{ route('admin.orders.delete', ['order' => $order->id]) }}">Удалить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('admin.layouts.components.modals.comments', ['id' => $order->id, 'comment' => $order->comment])
            @endforeach
        @else
            <h5 class="py-5 text-center text-muted">Список заказов и расчётов пуст..</h5>
        @endif


    </div>



@endsection