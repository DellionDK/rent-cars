@extends('admin.layouts.app')
@section('title', 'Главная страница')

@section('content')
    <div class="page-header mb-4">
        <div class="media">
            <img alt="Image" src="{{ asset('assets/admin-panel/images/user.jpg') }}" class="avatar avatar-lg mt-1">
            <div class="media-body ml-3">
                <h1 class="mt-2">{{ auth()->user()->email }}</h1>
            </div>
        </div>
    </div>


    <form action="{{ route('admin.index') }}" method="POST">
        @csrf
        <div class="card card-body">
            <h5>Изменение пароля</h5>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Текущий пароль</label>
                    <input type="password" class="form-control" placeholder="Текущий пароль" id="current_password"
                           name="current_password"/>
                </div>

                <div class="col-md-6 form-group">
                    <label>Новый пароль</label>
                    <input type="password" class="form-control" placeholder="Текущий пароль" id="new_password"
                           name="new_password"/>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Применить изменения</button>
            </div>
        </div>
    </form>


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