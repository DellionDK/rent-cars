<div style="display: none;" id="hidden-call">
    <div class="contact_us">
        <h2 class="black">{{ __('обратный звонок') }}</h2>
        <form method="post" action="{{ route('landing.form.call') }}" novalidate="novalidate" id="call-form">
            @csrf
            <div id="errors"></div>
            <div class="form-group">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('Имя') }}" required>
            </div>
            <div class="form-group">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <input id="phone" name="phone" type="tel" class="form-control" placeholder="{{ __('Телефон') }}" required>
            </div>
            <div class="result"></div>
            <div class="form-group">
                <button type="submit" class="subm">{{ __('заказать звонок') }}</button>
            </div>
        </form>
    </div>
</div>


<script>
    if (document.querySelector('#call-form')) {
        document.querySelector('#call-form').addEventListener('submit', (e) => {
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
                            $("[name='" + field + "']").removeClass('form-error');
                            for(let index in $("[name='" + field + "']")) {
                                if($("[name='" + field + "']")[index].nextElementSibling){
                                    $("[name='" + field + "']")[index].nextElementSibling.remove();
                                }
                            }
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