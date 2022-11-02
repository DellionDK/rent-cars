<div style="display: none;" id="hidden-calculate">
    <div class="contact_us calculate">
        <h2 class="black">{{ __('Рассчитать стоимость заказа') }}</h2>
        <form method="post" action="{{ route('landing.form.order') }}" novalidate="novalidate" id="calculate_modal_{{ $car->id }}">
            @csrf
            <div class="form-group">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('Имя') }}" required="" aria-required="true">
            </div>
            <div class="row">
                <div class="form-group col-sm-5">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <input id="phone" name="phone" type="tel" class="form-control" placeholder="{{ __('Телефон') }}" required="" aria-required="true">
                </div>
                <div class="form-group col-sm-7">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" required="" aria-required="true">
                </div>
                <div class="clearfix"></div>
            </div>
            <input type="hidden" id="type" class="form-control" name="type" value="calculate" />
            <input type="hidden" id="car" class="form-control" name="car" value="{{ $carName }}" />

            <div class="row">
                <div class="form-group col-sm-12">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input id="date" name="date" type="text" class="form-control" placeholder="{{ __('Дата заказа') }}" required="" aria-required="true" autocomplete="off" style="min-width: 95%!important;">
                </div>
                <div class="form-group col-sm-12">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <textarea cols="30" rows="1" id="time" name="time" type="text" class="form-control time_area" placeholder="{{ __("Время работы авто (например:'09:00‑17:00')") }}" required="" aria-required="true"></textarea>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="form-group">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <textarea id="comment" name="comment" cols="30" rows="5" placeholder="{{ __('Пожелания или комментарии к заказу') }}"></textarea>
            </div>
            <div class="result"></div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <button type="submit" class="subm subm_order">{{ __('рассчитать') }}</button>
                    <a  data-fancybox="" data-src="#hidden-thanks" style="display: none" href="javascript:;" id="open_thanks"></a>
                </div>
            </div>
        </form>
    </div>
    <button data-fancybox-close="" class="fancybox-close-small"></button></div>

@include('landing.components.modals.thanks')

<script>
    if (document.querySelector('#calculate_modal_{{ $car->id }}')) {
        document.querySelector('#calculate_modal_{{ $car->id }}').addEventListener('submit', (e) => {
            e.preventDefault();
            const form = e.target;
            const data = Object.fromEntries(new FormData(e.target).entries());
            let formData = new FormData();
            formData.append('driver', false);

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

                    if (data.status) {
                        $(".fancybox-close-small").click();
                        $("#open_thanks").click();
                    }

                    if (data.status && !data.redirect && data.message) {
                        $("#message").append(`<span class="text-success d-block"><em class="icon ni ni-check"></em> ${data.message}</span>`);
                    }

                }
            });
        });
    }
</script>