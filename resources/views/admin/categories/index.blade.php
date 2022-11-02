@extends('admin.layouts.app')
@section('title', 'Список категорий')

@section('content')

    <div class="row mb-2">
        <div class="col-md-8 m-auto text-left">
            <h1 class="display-5 mb-3">Список категорий</h1>
        </div>
        <div class="col-md-4 m-auto text-right">
            <a href="{{ route('admin.categories.add') }}" class="btn btn-success">Новая категория</a>
        </div>
    </div>

    <div class="card-list">

        @if(count($categories) > 0)
            @foreach($categories as $category)
                <div class="card card-task">
                    <div class="card-body">
                        <div class="card-title">
                            <a href="#">
                                <h6 data-filter-by="text" class="H6-filter-by-text">{{ $category->name }}</h6>
                                <span class="text-small">{{ $category->url }}</span>
                            </a>
                        </div>
                        <div class="card-meta">
                            <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="task-dropdown-button-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" style="">
                                    <a class="dropdown-item" href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Изменить</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('admin.categories.delete', ['category' => $category->id]) }}">Удалить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h5 class="py-5 text-center text-muted">Список категорий пуст..</h5>
        @endif


    </div>



@endsection