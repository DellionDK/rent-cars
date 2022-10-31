
<div style="display: none; background-color: #FDC210;" id="hidden-order-without{{ $car->id }}">
    <div class="contact_us order" style="width: auto;">
        <h2 class="black">{{ __('Арендовать автомобиль') }}</h2>
        <form method="post" action="{{ route('landing.form.order') }}" novalidate="novalidate"
              id="order_modal_without_{{ $car->id }}">
            @csrf
            <div class="form-group">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('Имя') }} *" required=""
                       aria-required="true" data-options='{"autoFocus" : false}'>
            </div>
            <div class="row">
                <div class="form-group col-sm-5">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <input id="phone" name="phone" type="tel" class="form-control" placeholder="{{ __('Телефон') }} *"
                           required="" aria-required="true">
                </div>
                <div class="form-group col-sm-7">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" required=""
                           aria-required="true">
                </div>
                <div class="clearfix"></div>
            </div>

            <input type="hidden" id="select2" name="select2" value=" - ">
            <input type="hidden" id="type" name="type" value="order">
            <input type="hidden" id="car" name="car" value="{{ $car->brand }}">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <input id="date" name="date" type="text" class="form-control" placeholder="{{ __('Дата выдачи') }} *" required="" aria-required="true" autocomplete="off" style="min-width: 95%!important;">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <input id="end_date" name="end_date" type="text" class="form-control" placeholder="{{ __('Дата возврата') }} *" required="" aria-required="true" autocomplete="off" style="min-width: 95%!important;">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <input id="start_time" name="start_time" type="text" class="form-control" placeholder="{{ __('Время выдачи') }}" required="" aria-required="true" autocomplete="off" style="min-width: 95%!important;">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <input id="end_time" name="end_time" type="text" class="form-control" placeholder="{{ __('Время возврата') }}" required="" aria-required="true" autocomplete="off" style="min-width: 95%!important;">
                    </div>
                </div>
            </div>

            <!-- <div class="form-group">
               <i class="fa fa-clock-o" aria-hidden="true"></i><textarea cols="30" rows="1" id="ftime" name="ftime" type="text" class="form-control time_area" placeholder="Время работы авто (например:'09:00&#8209;17:00')" required></textarea>
            </div> -->

            <div class="form-group">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <textarea id="comment" name="comment" cols="30" rows="5"
                          placeholder="{{ __('Пожелания или комментарии к заказу') }}"></textarea>
            </div>


            <div class="result"></div>
            <div class="form-group">
                <button type="submit" class="subm subm_order">{{ __('арендовать') }}</button>
                <a  data-fancybox="" data-src="#hidden-thanks-order" style="display: none" href="javascript:;" id="open_thanks_order"></a>
            </div>
        </form>
    </div>
</div>

@include('landing.components.modals.thanks_order')

<script>

    if (document.querySelector('#order_modal_without_{{ $car->id }}')) {
        document.querySelector('#order_modal_without_{{ $car->id }}').addEventListener('submit', (e) => {
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

            let checkbox = $($("input[type='checkbox']")[0]);
            if (checkbox.length > 0) {
                formData.set(checkbox.attr('name'), checkbox.prop('checked'));
            }

            formData.append('driver', false);

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
                            for (let index in $("[name='" + field + "']")) {
                                if ($("[name='" + field + "']")[index].nextElementSibling) {
                                    $("[name='" + field + "']")[index].nextElementSibling.remove();
                                }
                            }
                            $("[name='" + field + "']").addClass('form-error');
                            $("[name='" + field + "']").after(`<span class="text-danger d-block"><em class="icon ni ni-cross"></em> ${errors[field]}</span>`)
                        }
                    }
                    if (data.status) {
                        $(".fancybox-close-small").click();
                        $("#open_thanks_order").click();
                    }

                    if (data.status && !data.redirect && data.message) {
                        $("#message").append(`<span class="text-success d-block"><em class="icon ni ni-check"></em> ${data.message}</span>`);
                    }

                }
            });
        });
    }
</script>