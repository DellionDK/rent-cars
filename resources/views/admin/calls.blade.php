@extends('admin.layouts.app')
@section('title', 'Заказы и расчёты')

@section('content')

    <div class="row mb-2">
        <div class="col-md-12 m-auto text-left">
            <h1 class="display-5 mb-3">Заказы и расчёты</h1>
        </div>
    </div>

    <div class="card-list">

        @if(count($calls) > 0)
            @foreach($calls as $call)
                <div class="card card-task">
                    <div class="card-body">
                        <div class="card-title">
                            <h6 data-filter-by="text" class="H6-filter-by-text">
                                {{ $call->name }}
                            </h6>
                            <span class="text-small">Телефон: <b>{{ $call->phone }}</b></span> /
                            <span class="text-muted text-small">
                                Добавлено {{ $call->created_at }}
                            </span>
                        </div>
                        <div class="card-meta">
                            <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="task-dropdown-button-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item text-danger" href="{{ route('admin.calls.delete', ['call' => $call->id]) }}">Удалить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h5 class="py-5 text-center text-muted">Список заказов и расчётов пуст..</h5>
        @endif


    </div>



@endsection