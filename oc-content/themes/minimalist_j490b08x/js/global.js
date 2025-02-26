$(document).ready(function() {
	// User_menu show/hide submenu
	$("#user_menu .with_sub").hover(function() {
		$(this).find("ul").show();
	},
			function() {
				$(this).find("ul").hide();
			});

	// Open login box in situ
	$('#login_open').click(function(e) {
		e.preventDefault();
		$('#login').slideToggle('slow', function() {
		});
	});

	// Apply the UniForm plugin to pulldows and button
	//$("input:file, textarea, select, button, .search select, .search button, .filters select, .filters button, #comments form button, #contact form button, .user_forms form button, .add_item form select, .add_item form button, .modify_profile select, .modify_profile button").uniform({fileDefaultText: fileDefaultText,fileBtnText: fileBtnText});

	// Show advanced search in internal pages
	$("#expand_advanced").click(function(e) {
		e.preventDefault();
		$(".search .extras").slideToggle();
	});

	// Show/hide Report as
	$("#report").hover(function() {
		$(this).find("span").show();
	},
			function() {
				$(this).find("span").hide();
			});

	// Hide login box
	$('html').click(function() {
		$('#login').hide();
	});
	$('#login,#login_open').click(function(event) {
		event.stopPropagation();
	});

	/**
	 * custom function 
	 */
	$('.home #main .category h1').click(toggleHomeCategories);

});


function getWith()
{
	return window.innerWidth || document.documentElement.clientWidth || 960;
}

function toggleHomeCategories(event)
{
	var $me = $(this);
	var $ul = $('ul', $me.parents('.category:first'));

	// toggle is with smaller than 
	if (getWith() <= 450 || $ul.is(':hidden'))
	{
		$ul.slideToggle();

		event.preventDefault();
		return;
	}
	return true;
}

/* init fancybox */
var fancybox_options = {
	openEffect: 'none',
	closeEffect: 'none',
	nextEffect: 'fade',
	prevEffect: 'fade',
	loop: true,
	helpers: {
		title: {
			type: 'inside'
		}
	}
};
$(document).ready(function() {
	// if fancybox loaded
	if (typeof $.fancybox == 'function') 
	{
		$("#photos a").each(function(i) {
			if (i != 0)
			{
				$clone = $(this).clone(false);
				//alert($clone.html());
				$clone.html('');
				$clone.appendTo('#photos_mobile');
			}
		});

		$("#photos a").fancybox(fancybox_options);

		$("#photos_mobile a").prop('rel', 'image_group_mobile');
		$("#photos_mobile a").fancybox(fancybox_options);
	}
});