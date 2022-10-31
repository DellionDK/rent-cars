$(document).ready(function() {

	$('#select5').val($('.single_info h2').text() + $('.single_info .car_year').text().replace("Год:","") );
	//console.log($('#select5').val());
	$('#Container').mixItUp();
	$(".owl-carousel").owlCarousel({
		center: true,
    	items:1,
    	loop:true,
    	autoplay: true,
    	autoplayTimeout: 25000,
    	margin: 10,
    	// margin: function(){
    	// 	if($(window).width() <= 767){
    	// 		return 0;
    	// 	}else{
    	// 		return -290;
    	// 	}
    	// },
    	responsive:{
    		320:{
	            items:1
	        },
	        768:{
	            items:3
	        },
	        1200:{
	            items:5
	        }
	    }
	});

	

	var menu_selector = ".navmenus"; // Переменная должна содержать название класса или идентификатора, обертки нашего меню.
 
	function onScroll(){
	    var scroll_top = $(document).scrollTop();
	    $(menu_selector + " a").each(function(){
	        var hash = $(this).attr("href");
	        var target = $(hash);
	        if (target.position().top - 120 <= scroll_top && target.position().top  + target.outerHeight() > scroll_top) {
	            $(menu_selector + " a.active").removeClass("active");
	            $(this).addClass("active");
	        } else {
	            $(this).removeClass("active");
	        }
	    });
	}

	 
    $(document).on("scroll", onScroll);
 
    $("a[href^=#]").click(function(e){
        e.preventDefault();
 
        $(document).off("scroll");
        $(menu_selector + " a.active").removeClass("active");
        $(this).addClass("active");
        var hash = $(this).attr("href");
        var target = $(hash);
 
        if($(window).width() <= 767){
	        $("html, body").animate({
	            scrollTop: target.offset().top - 30 
	        }, 800, function(){
	            window.location.hash = hash;
	            $(document).on("scroll", onScroll);
	        });
	    }else if($(window).width() <= 991 ){
	    	$("html, body").animate({
	            scrollTop: target.offset().top - 115
	        }, 800, function(){
	            window.location.hash = hash;
	            $(document).on("scroll", onScroll);
	        });
	    }else if($(window).width() <= 1199 ){
	    	$("html, body").animate({
	            scrollTop: target.offset().top - 110
	        }, 800, function(){
	            window.location.hash = hash;
	            $(document).on("scroll", onScroll);
	        });
	    }else{
	    	$("html, body").animate({
	            scrollTop: target.offset().top - 80
	        }, 800, function(){
	            window.location.hash = hash;
	            $(document).on("scroll", onScroll);
	        });
	    }
 
    });


	$('.menu_cars').on('click', 'button', function(event) {
         $(this).addClass("current").siblings().removeClass("current");  
         event.preventDefault();
    });



    $('#show-more').click(function() {
		$('#more').show().removeClass('hiddens');
		$(this).hide();
	});



	// $.validator.setDefaults( {
	// 		submitHandler: function () {
	// 			alert( "submitted!" );
	// 		}
	// 	} );

	jQuery.validator.addMethod("lettersonly", function(value, element) {
	  return this.optional(element) || /^[а-яА-Яa-zA-Z]+$/i.test(value);
	}, "Letters only please"); 

	$( "#callForm" ).validate( {
				rules: {
					firstname: {
						required: true,
						lettersonly: true,
						minlength: 2,
						maxlength: 20
					},
					tel: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10
					}
				},
				messages: {
					firstname: {
						required: "Введите свое имя",
						lettersonly: "Только буквы",
						minlength: "Минимум 2 буквы",
						maxlength: "Не более 20 букв"
					},
					tel: {
						required: "Введите ваш номер телефона",
						number: "Только цифры",
						minlength: "Минимум 10 цифр",
						maxlength: "Не более 10 цифр"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			} );

	$( "#callForm1" ).validate( {
				rules: {
					firstname1: {
						required: true,
						lettersonly: true,
						minlength: 2,
						maxlength: 20
					},
					tel1: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10
					}
				},
				messages: {
					firstname1: {
						required: "Введите свое имя",
						lettersonly: "Только буквы",
						minlength: "Минимум 2 буквы",
						maxlength: "Не более 20 букв"
					},
					tel1: {
						required: "Введите ваш номер телефона",
						number: "Только цифры",
						minlength: "Минимум 10 цифр",
						maxlength: "Не более 10 цифр"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			});

	$( "#callForm2" ).validate( {
				rules: {
					firstname4: {
						required: true,
						lettersonly: true,
						minlength: 2,
						maxlength: 20
					},
					tel4: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10
					}
				},
				messages: {
					firstname4: {
						required: "Введите свое имя",
						lettersonly: "Только буквы",
						minlength: "Минимум 2 буквы",
						maxlength: "Не более 20 букв"
					},
					tel4: {
						required: "Введите ваш номер телефона",
						number: "Только цифры",
						minlength: "Минимум 10 цифр",
						maxlength: "Не более 10 цифр"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			});

	$("#order").validate({
				rules: {
					firstname2: {
						required: true,
						lettersonly: true,
						minlength: 2,
						maxlength: 20
					},
					tel2: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10
					},
					email2: {
						required: true,
						email: true
					},
					select2: "required",
					date2: "required",
					ftime2: "required",
					address2: {
						required: true,
						maxlength: 80
					},
					stime2: "required",
					lend2: {
						required: true,
						number: true,
						maxlength: 10
					},
				},
				messages: {
					firstname2: {
						required: "Введите свое имя",
						lettersonly: "Только буквы",
						minlength: "Минимум 2 буквы",
						maxlength: "Не более 20 букв"
					},
					tel2: {
						required: "Введите ваш номер телефона",
						number: "Только цифры",
						minlength: "Минимум 10 цифр",
						maxlength: "Не более 10 цифр"
					},
					email2: {
						required: "Введите адресс эл. почты",
						email: "Введите корректный адрес"
					},
					select2: "Выберите автомобиль",
					date2: "Выберите дату",
					ftime2: "Выберите время",
					address2: {
						required: "Укажите адрес",
						maxlength: "Не более 80 букв"
					},
					stime2: "Выберите время окончания",
					lend2: {
						required: "Укажите кол-во километров",
						number: "Только цифры",
						maxlength: "Не более 10 цифр"
					},
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			});

	$("#order1").validate({
				rules: {
					firstname5: {
						required: true,
						lettersonly: true,
						minlength: 2,
						maxlength: 20
					},
					tel5: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10
					},
					email5: {
						required: true,
						email: true
					},
					select5: "required",
					date5: "required",
					ftime5: "required",
					address5: {
						required: true,
						maxlength: 80
					},
					stime5: "required",
					lend5: {
						required: true,
						number: true,
						maxlength: 10
					},
				},
				messages: {
					firstname5: {
						required: "Введите свое имя",
						lettersonly: "Только буквы",
						minlength: "Минимум 2 буквы",
						maxlength: "Не более 20 букв"
					},
					tel5: {
						required: "Введите ваш номер телефона",
						number: "Только цифры",
						minlength: "Минимум 10 цифр",
						maxlength: "Не более 10 цифр"
					},
					email5: {
						required: "Введите адресс эл. почты",
						email: "Введите корректный адрес"
					},
					select5: "Выберите автомобиль",
					date5: "Выберите дату",
					ftime5: "Выберите время",
					address5: {
						required: "Укажите адрес",
						maxlength: "Не более 80 букв"
					},
					stime5: "Выберите время окончания",
					lend5: {
						required: "Укажите кол-во километров",
						number: "Только цифры",
						maxlength: "Не более 10 цифр"
					},
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			});

	$("#calculate").validate({
				rules: {
					firstname3: {
						required: true,
						lettersonly: true,
						minlength: 2,
						maxlength: 20
					},
					tel3: {
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10
					},
					email3: {
						required: true,
						email: true
					},
					select3: "required",
					date3: "required",
					stime3: {
						required: true,
						number: true,
						maxlength: 2
					},
					lend3: {
						required: true,
						number: true,
						maxlength: 10
					},
				},
				messages: {
					firstname3: {
						required: "Введите свое имя",
						lettersonly: "Только буквы",
						minlength: "Минимум 2 буквы",
						maxlength: "Не более 20 букв"
					},
					tel3: {
						required: "Введите ваш номер телефона",
						number: "Только цифры",
						minlength: "Минимум 10 цифр",
						maxlength: "Не более 10 цифр"
					},
					email3: {
						required: "Введите адресс эл. почты",
						email: "Введите корректный адрес"
					},
					select3: "Выберите автомобиль",
					date3: "Выберите дату",
					stime3: {
						required: "Укажите кол-во часов",
						number: "Только цифры",
						maxlength: "Не более 2 цифр"
					},
					lend3: {
						required: "Укажите кол-во километров",
						number: "Только цифры",
						maxlength: "Не более 10 цифр"
					},
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
				}
			});

	(function(){
	    var burger = document.querySelector('.burger-container'),
	        header = document.querySelector('.header');
	    
	    burger.onclick = function() {
	        header.classList.toggle('menu-opened');
	    }
	}());

	$('.menu a').click(function () {
    	setTimeout(function(){
  			$('.burger-container').trigger('click');
		}, 200);
	});

	$('.filt').click(function () {
		setTimeout(function(){
			$('#show-more').trigger('click');
		}, 50);
	});


	jQuery.datetimepicker.setLocale('ru');

	$('#ftime2').datetimepicker({
  		datepicker:false,
  		format:'H:i'
	});

	$('#stime2').datetimepicker({
  		datepicker:false,
  		format:'H:i'
	});

	$('#date2').datetimepicker({
  		timepicker:false,
  		format:'d.m.Y'
	});

	$('#date3').datetimepicker({
  		timepicker:false,
  		format:'d.m.Y'
	});

	$('#ftime5').datetimepicker({
  		datepicker:false,
  		format:'H:i'
	});

	$('#stime5').datetimepicker({
  		datepicker:false,
  		format:'H:i'
	});

	$('#date5').datetimepicker({
  		timepicker:false,
  		format:'d.m.Y'
	});

	$( "#order, #order1, #callForm, #callForm1, #callForm2, #calculate" ).on( "submit", function( event ) {
         event.preventDefault();

         var action = $(this).attr('action');
         var data = $(this).serialize();
         var formId = $(this).attr('id');
        if($("#" + formId).valid()){
        $.ajax({
          type: "POST",
          url: action,
          data: data,
          success: function(msg){
            res = JSON.parse(msg);
            $("#" + formId + " .isnull").empty();

            if(res.status == 'ok'){
                if(formId == 'order' || formId == 'order1' || formId == 'callForm' || formId == 'callForm1' || formId == 'callForm2' || formId == 'calculate'){
                    // $("#" + formId + " input").hide();
                    // $("#" + formId + " i").hide();
                    // $("#" + formId + " textarea").hide();
                    // $("#" + formId + " select").hide();
                }
                $("#" + formId + " .form-group").removeClass('has-success');
                $("#" + formId + " .result").html(res.message);
                $('#'+formId)[0].reset();
                setTimeout( function () { $('.result').empty(); }, 10000 );
                setTimeout( function () { $('.fancybox-close-small').click(); }, 10500 );
            }else{
                $("#" + formId + " .isnull."+res.status).html(res.message);
            }       
          }
        });}

    });

});