jQuery(document).ready(function ($) {
//////////////////////////////////////  PRELOADER
/////////////////////////////////////////////////
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({'overflow':'visible'});

/////////////////////////////////////////  SLIDER
/////////////////////////////////////////////////
	var options = { $AutoPlay: true };
	var jssor_slider1 = new $JssorSlider$('slider1_container', options);

/////////////////////////////////////////  HEADER
/////////////////////////////////////////////////
	$('h1').click(function(){
		window.location = './';
	});

///////////////////////////////////////  REGISTER
/////////////////////////////////////////////////
	$('.registerButton').click(function(){
		$('.registerModalWindow').css({
			'visibility': 'visible'
		});
	});
	$('.registerModalClose').click(function(){
		$('.registerModalWindow').css({
			'visibility': 'hidden'
		});
	});

///////////////////////////////////  COLLAGE PLUS
/////////////////////////////////////////////////
	$('.Collage').removeWhitespace().collagePlus({
        'targetHeight' : 240,
        'effect' : "effect-3",
        'allowPartialLastRow' : true
    });

    $('.Collage' > 'img').click(function(){
    	var pId = $(this).attr('id');
    });

///////////////////////////////////////  LIGHTBOX
/////////////////////////////////////////////////
	$('.gallery').each(function() {
	    $(this).magnificPopup({
	        delegate: 'a',
	        type: 'image',
	        gallery: {
	          enabled:true
	        }
	    });
	});

});

