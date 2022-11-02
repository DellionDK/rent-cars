@extends('admin.layouts.app')
@section('title', 'Добавление новой категории')

@section('content')

    <h1 class="display-5 mb-3">Добавление новой категории</h1>

    <form action="{{ route('admin.categories.add') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="errors" id="errors"></div>
                <div class="form-group">
                    <label for="name">Название категории (RU):</label>
                    <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Название категории" />
                </div>
                <div class="form-group">
                    <label for="name">Название категории (EN):</label>
                    <input type="text" class="form-control form-control-lg" id="name_en" name="name_en" placeholder="Название категории" />
                </div>
                <div class="form-group">
                    <label for="position">Позиция категории:</label>
                    <input type="text" class="form-control form-control-lg" id="position" name="position" placeholder="Позиция категории" />
                    <span class="text-muted text-small">Категории выводятся по порядку (1.. 2.. 3..)</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Добавить категорию</button>
                </div>
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