@extends('admin.layouts.app')
@section('title', 'Список администраторов')

@section('content')

    <div class="row">

        <div class="col-md-4">

            <form action="{{ route('admin.admins.index') }}" method="POST">
                @csrf
                <div class="card card-body">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" placeholder="Укажите E-mail" name="email" id="email"/>
                    </div>
                    <div class="form-group">
                        <label>Пароль</label>
                        <input type="text" class="form-control" placeholder="Укажите пароль" name="password" id="password"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Добавить администратора</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-md-8">
            <ul class="list-group">

                @if(session()->has('message'))
                    <div class="alert alert-success py-2">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if(count($admins) > 0)
                    @foreach($admins as $admin)
                        <li class="list-group-item">
                            {{ $admin->email }}
                            <span class="actions" style="float: right;">
                                <a href="{{ route('admin.admins.delete', ['id' => $admin->id]) }}" class="btn btn-danger btn-xs">Удалить администратора</a>
                            </span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

    </div>


    <script>
        if (document.querySelector('form')) {
            document.querySelector('form').addEventListener('submit', (e) => {
                console.log('test');
                e.preventDefault();
                const form = e.target;
                const data = Object.fromEntries(new FormData(e.target).entries());
                let formData = new FormData();

                $.each(data, function (i, val) {
                    formData.append(i, val);
                });

                if ($("select[multiple]")) {
                    formData.set($("select[multiple]").attr('name'), $("select[multiple]").val());
                }

                let checkboxes = $("input[type='checkbox']");
                if (checkboxes.length > 0) {
                    checkboxes.each(function (index) {

                        let checkbox = $(checkboxes[index]);
                        console.log(checkbox.attr('name'), checkbox.prop('checked'))
                        formData.set(checkbox.attr('name'), checkbox.prop('checked'));
                    });
                }

                $.ajax({
                    type: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#message').html('');
                        $('#errors').html('');

                        if (!data.status) {
                            let errors = JSON.parse(data.errors);
                            for (let field in errors) {
                                $("[name='" + field + "']").addClass('form-error');
                                $("[name='" + field + "']").after(`<span class="text-danger d-block"><em class="icon ni ni-cross"></em> ${errors[field]}</span>`)
                            }
                        }
                        if (data.status && data.redirect) {
                            window.location.href = data.redirect;
                        }

                        if (data.status && !data.redirect && data.message) {
                            $("#message").append(`<span class="text-success d-block"><em class="icon ni ni-check"></em> ${data.message}</span>`);
                        }

                    }
                });
            });
        }
    </script>

@endsection