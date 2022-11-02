$(document).ready(function() {

	$(".but_wrap a.order").click(function(){
		var model = $(this).parent().parent().find(".car_model").text();
		var year = $(this).parent().parent().find(".car_year").text().replace("Year: ","");
	$("input#select2").val(model+ " - " +year);
	//console.log($('#select2').val());
	});

	$('#select5').val($("h1").text().replace("Аренда ", "") + $('.single_info .car_year').text().replace("Year:","") );
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
	

	var menu_selector = ".navmenus";
 
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

	function scrollToHash(target,hash){
		// window.location.hash = hash;
			if($(window).width() <= 767){
		        $("html, body").animate({
		            scrollTop: target.offset().top - 30 
		        }, 800, function(){
		            //window.location.hash = hash;
		            $(document).on("scroll", onScroll);
		        });
		    }else if($(window).width() <= 991 ){
		    	$("html, body").animate({
		            scrollTop: target.offset().top - 115
		        }, 800, function(){
		            //window.location.hash = hash;
		            $(document).on("scroll", onScroll);
		        });
		    }else if($(window).width() <= 1199 ){
		    	$("html, body").animate({
		            scrollTop: target.offset().top - 110
		        }, 800, function(){
		            //window.location.hash = hash;
		            $(document).on("scroll", onScroll);
		        });
		    }else{
		    	$("html, body").animate({
		            scrollTop: target.offset().top - 80
		            // window.scrollTo(0,target.offset().top - 80)
		        }, 800, function(){
		            // window.location.hash = hash;
		            $(document).on("scroll", onScroll);
		        });
		    }
	}

var hash = window.location.hash;
window.location.hash = '';
	setTimeout(function(){
		// hash = window.location.hash;
		// window.location.hash = '';
		// target = $("header a[href=#]");
		if(hash){
			target = $("header a[href^=" + hash + "]:visible");
			if(target.length >0 ){
				// hash = $(target).attr("href");
				$(menu_selector + " a.active").removeClass("active");
				target.addClass("active");
				if(hash === '#reviews'){
					setTimeout(function(){
						// scrollToHash(target,hash);
						target.click();
					},1200)
				}else{
					// scrollToHash(target,hash);
					target.click();
				}			
			}
		}		

	},500);
	

	 
    $(document).on("scroll", onScroll);
 
    $("a[href^=#]").click(function(e){
        e.preventDefault();
        e.stopPropagation();
        $(document).off("scroll");
        $(menu_selector + " a.active").removeClass("active");
        $(this).addClass("active");
        var hash = $(this).attr("href");
        var target = $(hash);
 		scrollToHash(target,hash);
    });


	$('.menu_cars').on('click', 'button', function(event) {
         $(this).addClass("current").siblings().removeClass("current");  
         event.preventDefault();
    });



    $('#show-more').click(function() {
		$('#more').show().removeClass('hiddens');
		$(this).hide();
		$("#more").css('height', 'auto');
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
						required: "Enter your name",
						lettersonly: "Letters only",
						minlength: "At least 2 letters",
						maxlength: "Not more than 20 letters"
					},
					tel: {
						required: "Enter your phone number",
						number: "Only numbers",
						minlength: "At least 10 digits",
						maxlength: "Not more than 10 digits"
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
						required: "Enter your name",
						lettersonly: "Letters only",
						minlength: "At least 2 letters",
						maxlength: "Not more than 20 letters"
					},
					tel1: {
						required: "Enter your phone number",
						number: "Only numbers",
						minlength: "At least 10 digits",
						maxlength: "Not more than 10 digits"
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
						required: "Enter your name",
						lettersonly: "Letters only",
						minlength: "At least 2 letters",
						maxlength: "Not more than 20 letters"
					},
					tel4: {
						required: "Enter your phone number",
						number: "Only numbers",
						minlength: "At least 10 digits",
						maxlength: "Not more than 10 digits"
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
						maxlength: 40
					},
					stime2: "required"
				},
				messages: {
					firstname2: {
						required: "Enter your name",
						lettersonly: "Letters only",
						minlength: "At least 2 letters",
						maxlength: "Not more than 20 letters"
					},
					tel2: {
						required: "Enter your phone number",
						number: "Only numbers",
						minlength: "At least 10 digits",
						maxlength: "Not more than 10 digits"
					},
					email2: {
						required: "Enter the email address",
						email: "Enter the correct address"
					},
					select2: "Choose a car",
					date2: "Select a date",
					ftime2: "Choose a time",
					address2: {
						required: "Enter an address",
						maxlength: "Not more than 40 letters"
					},
					stime2: "Select end time"
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
					stime5: "required"
				},
				messages: {
					firstname5: {
						required: "Enter your name",
						lettersonly: "Letters only",
						minlength: "At least 2 letters",
						maxlength: "Not more than 20 letters"
					},
					tel5: {
						required: "Enter your phone number",
						number: "Only numbers",
						minlength: "At least 10 digits",
						maxlength: "Not more than 10 digits"
					},
					email5: {
						required: "Enter the email address",
						email: "Enter the correct address"
					},
					select5: "Choose a car",
					date5: "Select a date",
					ftime5: "Choose a time",
					address5: {
						required: "Enter an address",
						maxlength: "Not more than 80 letters"
					},
					stime5: "Select end time"
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
					stime3: {
						required: true,
						// number: true,
						// maxlength: 2
					},
					date3: "required"
				},
				messages: {
					firstname3: {
						required: "Enter your name",
						lettersonly: "Letters only",
						minlength: "At least 2 letters",
						maxlength: "Not more than 20 letters"
					},
					tel3: {
						required: "Enter your phone number",
						number: "Only numbers",
						minlength: "At least 10 digits",
						maxlength: "Not more than 10 digits"
					},
					email3: {
						required: "Enter the email address",
						email: "Enter the correct address"
					},
					select3: "Choose a car",
					date3: "Select a date",
					stime3: {
						required: "Specify number of hours",
						number: "Only numbers",
						maxlength: "Not more than 2 digits"
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
	    var burger = $('.burger-container'),
	        header = document.querySelector('.header');
	    
	    burger.on('click',function(e){
	        header.classList.toggle('menu-opened');
	})
	    // burger.onclick = function(e) {
	    // 	if(e.target){
	    //     header.classList.toggle('menu-opened');
	    // }
	    // }
	}());

	$('.menu a').click(function () {
    	setTimeout(function(){
  			$('.header').removeClass("menu-opened");
		}, 200);
	});

	$('.filt').click(function () {
		$("#more").addClass('height_auto');	
		setTimeout(function(){
			$('#show-more').trigger('click');
		}, 50);
	});


	jQuery.datetimepicker.setLocale('en');

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
  		format:'d.m.Y',
  		dayOfWeekStart: 1
	});

	$('#date3').datetimepicker({
  		timepicker:false,
  		format:'d.m.Y',
  		dayOfWeekStart: 1
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
  		format:'d.m.Y',
  		dayOfWeekStart: 1
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
				window.location.href = "https://arenda-mercedes.kiev.ua/En/thanks.html"
            }else{
                $("#" + formId + " .isnull."+res.status).html(res.message);
            }       
          }
        });}

    });

	// $('.navmenus a').find("#about").click( function () {
	// 	$(window).onload(function(){

	// 	setTimeout( function () {
	// 		$('.navmenus a').find("#about").click()
	// 	}, 2000 )

	// 	});
	// });
	var n = (new Date).getFullYear();
	$(".year-now").html(n);
	
	var width = $('.mix').width();
	$('.catalog_img_item').height(width - 35);
});

$( window ).resize(function() {
	// console.log('khjk');	
	var w = $('.catalog_img_item').width();
	/*$('.catalog_img_item').height(w - 35);*/
});

// $(window).on('resize', function(){
//         if($(window).width() < 425){
//           $('#main').css({
//             'padding-top': $('.navbar').outerHeight()
//           });
//         } else{
//           $('#main').css({
//             'padding-top': 0
//           });
//         }
//       });
//       $(document).ready(function(){
//         if($(window).width() < 425){
//           $('#main').css({
//             'padding-top': $('.navbar').outerHeight()
//           });
//         } else{
//           $('#main').css({
//             'padding-top': 0
//           });
//         }    
// 	  });
	  
	  $(document).ready(function() {

	

		if(window.location.href === "https://arenda-mercedes.kiev.ua/?buses"){
			$('html, body').animate({
			scrollTop: $(".menu_cars").offset().top
		  }, 1000, function() {
			   $('.menu_cars .filter:last-child').trigger( "click" );
		  })
		  }
	  });