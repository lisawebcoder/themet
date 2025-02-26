$(document).ready(function() {
	//Modal heandling

	$('.get_cat_id').click(function() {
		var id = $(this).attr('id');
		$('#s'+id).show();
	});
	$('.launch_modal').click(function() {
		$('#content').css("overflow", "hidden");
	});
	$('.close').click(function(){
		$('#content').css("overflow", "auto");
	})
	if ($('#flashmessage').length > 0) { 
		$("#flashmessage_container").show().delay(5000).fadeOut();
	}
	
	// search page grid/list view
	$(".grid-view").click(function () {
		$(".profile-article-wrap").addClass('profile-artile-grid');
		$(".list-view").removeClass('active');
		$(this).addClass('active');
		return false;
	});
	$(".list-view").click(function () {
		$(".profile-article-wrap").removeClass('profile-artile-grid');
		$(".grid-view").removeClass('active');
		$(this).addClass('active');
		return false;
	});
		$(".color_picker").click(function(){
			$(".select_color").animate({left: '0px'});
		});
		
});
	
	//Snap  menu icons
	$('.menu').click(function(){
	  $("span",this).toggleClass("fa-arrow-left fa-bars");
	});
	$('.search').click(function(){
	  $("span",this).toggleClass("fa-arrow-right fa-search");
	});
	$('.search-r').click(function(){
	  $("span",'.search').toggleClass("fa-arrow-right fa-search");
	});

	//Snap  events
	var snapper = new Snap({
		element: document.getElementById('content')
	});

	var addEvent = function addEvent(element, eventName, func) {
		if (element.addEventListener) {
			return element.addEventListener(eventName, func, false);
		} else if (element.attachEvent) {
			return element.attachEvent("on" + eventName, func);
		}
	};

		addEvent(document.getElementById('open-left'), 'click', function(){
			if( snapper.state().state=="left" ){
			   snapper.close('left');
			}else {
				snapper.open('left');						
			}
		});
		addEvent(document.getElementById('open-right'), 'click', function(){
			if( snapper.state().state=="right" ){
			   snapper.close('right');
			}else {
				snapper.open('right');
			}
		});
		addEvent(document.getElementById('select_lang'), 'click', function(){
			if( snapper.state().state=="left" ){
			   snapper.close('left');
			}
		});
		addEvent(document.getElementById('open-r'), 'click', function(){
			if( snapper.state().state=="right" ){
			   snapper.close('right');
			}else {
				snapper.open('right');
			}
		});


	/* Prevent Safari opening links when viewing as a decent_mobile App */
	(function (a, b, c) {
		if(c in b && b[c]) {
			var d, e = a.location,
				f = /^(a|html)$/i;
			a.addEventListener("click", function (a) {
				d = a.target;
				while(!f.test(d.nodeName)) d = d.parentNode;
				"href" in d && (d.href.indexOf("http") || ~d.href.indexOf(e.host)) && (a.preventDefault(), e.href = d.href)
			}, !1)
		}
	})(document, window.navigator, "standalone");
	//Required Form Fields
	$(function(){
		   $("#password").prop('required',true);
		   $("#s_name").prop('required',true);
		   $("#s_password").prop('required',true);
		   $("#s_password2").prop('required',true);
		   $("#s_email").prop('required',true);
	});
	$(function() {

		var $body = $(document);
		$body.bind('scroll', function() {
			// "Disable" the horizontal scroll.
			if ($body.scrollLeft() !== 0) {
				$body.scrollLeft(0);
			}
		});

	}); 



