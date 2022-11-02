<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script async="" src="{{ asset('assets/admin-panel/js/app.js') }}"></script>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="https://pipeline.mediumra.re/assets/img/favicon.ico" rel="icon" type="image/x-icon">
    <link href="{{ asset('assets/admin-panel/images/icon') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin-panel/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin-panel/css/theme.css') }}" rel="stylesheet" type="text/css"
          media="all">
    <script type="text/javascript"
            src="{{ asset('assets/admin-panel/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin-panel/js/scripts.js') }}"></script>
</head>
<body class="auth-form">
    <div class="form-signin">
        @yield('content')
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
</body>
</html>