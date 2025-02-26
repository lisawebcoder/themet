var direction = $('html').attr('dir');
if(direction=='ltr'){
	$('.responsive').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		dots: false,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 4,
		//rtl: true,
		speed: 300,
		swipe:  true,
		responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
		]
	});
	$('.responsive-2').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		dots: false,
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 6,
		//rtl: true,
		speed: 300,
		swipe:  true,
		responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
		]
	});
}
else if(direction=='rtl'){
	$('.responsive').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		dots: false,
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 4,
		rtl: true,
		speed: 300,
		swipe:  true,
		responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
		]
	});
	$('.responsive-2').slick({
		autoplay: true,
		autoplaySpeed: 3000,
		dots: false,
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 6,
		rtl: true,
		speed: 300,
		swipe:  true,
		responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
		]
	});
}


