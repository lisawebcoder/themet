function animationClasses(){
	$('.draggable').addClass('wow fadeInUp');
	$('.thumbnail').hover(function(){
		$(this).addClass('animated pulse');
	}, function(){
		$(this).removeClass('animated pulse');
	});
	
	$('.selected-classifieds').addClass('wow fadeInUp');
	$('.listing-card ').addClass('wow fadeInUp');
	$('.above ').addClass('wow fadeInUp');
	
	$('.carousel-inner').hover(function(){
		$(this).addClass('animated pulse');
	}, function(){
		$(this).removeClass('animated pulse');
	});
	
	$('#main-map div').addClass('wow bounceIn');
}
function animationClasses2(){
	var cat = $('.row .panel-default');
	$.each(cat , function(i,v){
		if(ToInt32(i/4) == 0) { $(this).addClass('animated bounceInLeft'); return true;}
		else if(ToInt32(i/4) == 1) { $(this).addClass('animated bounceInRight'); return true;}
		else { $(this).addClass('animated bounceInLeft'); return true;}
	});			
}
function ToInt32(x) {
	return x << 0;
}
