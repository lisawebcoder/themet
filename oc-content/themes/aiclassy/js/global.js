aiclassy.extend = function(el, opt) {
        for (var name in opt) el[name] = opt[name];
        return el;
}
aiclassy.responsive = function(options) {
    defaults = {'selector':'#responsive-trigger'};
    options = $.extend(defaults, options);
    if($(options.selector).is(':visible')){
        return true;
    }
    return false;
}
aiclassy.toggleClass = function(element,destination,isObject) {
    var $selector = $('['+element+']');
    $selector.click(function (event) {
        var thatClass  = $(this).attr(element);
        var thatDestination;
        if (typeof(isObject) != "undefined"){
            var thatDestination  = $(destination);
        } else {
            var thatDestination  = $($(this).attr(destination));
        }
        thatDestination.toggleClass(thatClass);
        event.preventDefault();
        return;
    });
}
aiclassy.photoUploader = function(selector,options) {
    defaults = {'max':4};
    options = $.extend(defaults, options);
    aiclassy.photoUploaderActions($(selector),options);
}
aiclassy.addPhotoUploader = function(max) {
    if(max < $('input[name="'+$(this).attr('name')+'"]').length+$('.photos_div').length){
        var $image = $('<input type="file" name="photos[]">');
            aiclassy.photoUploaderActions(image);
        $('#post-photos').append($image);
    }
}
aiclassy.removePhotoUploader = function() {
    /*//removeAndAdd*/
},
aiclassy.photoUploaderActions = function($element,options) {
    $element.on('change',function(){
        var input  = $(this)[0];
        $(this).next('img').remove();
        $image = $('<img />');
        $image.insertAfter($element);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $image.attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            $image.remove();
        }
    });
}

function createPlaceHolder($element){
	if($element.hasClass('no-has-placeholder') || $('div#no-has-placeholder').length ){
	}else{
  var $wrapper = $('<div class="has-placeholder '+$element.attr('class')+'" />');
  $element.wrap($wrapper);
  var $label = $('<label/>');
      $label.append($element.attr('placeholder').replace(/^\s*/gm, ''));
      $element.removeAttr('placeholder');

  $element.before($label);
  $element.bind('remove', function() {
        $wrapper.remove();
    });
}
}

function selectUi(thatSelect){
    var uiSelect = $('<a href="#" class="select-box-trigger"></a>');
    var uiSelectIcon = $('<span class="select-box-icon">0</span>');
    var uiSelected = $('<span class="select-box-label">'+thatSelect.find("option:selected").text().replace(/^\s*/gm, '')+'</span>');
    var uiWrap = $('<div class="select-box '+thatSelect.attr('class')+'" />');

    thatSelect.css('filter', 'alpha(opacity=40)').css('opacity', '0');
    thatSelect.wrap(uiWrap);


    uiSelect.append(uiSelected).append(uiSelectIcon);
    thatSelect.parent().append(uiSelect);
    uiSelect.click(function(){
        return false;
    });
    thatSelect.on('focus',function(){
        thatSelect.parent().addClass('select-box-focus');
    });
    thatSelect.on('blur',function(){
        thatSelect.parent().removeClass('select-box-focus');
    });
    thatSelect.change(function(){
        str = thatSelect.find('option:selected').text().replace(/^\s*/gm, '');
        uiSelected.text(str);
    });
    thatSelect.bind('removed', function() {
        thatSelect.parent().remove();
    });
}
if (document.cookie.indexOf("visited") >= 0) {
  // They've been here before.
}else {
  // set a new cookie
  document.cookie = "visited=yes";
}

var all_regions =''; 
$(document).ready(function(event){
	
	
	if (document.cookie.indexOf("aiclassyvisited") >= 0) {
			
	}	else {
		document.cookie = "aiclassyvisited=yes";
		$('.demo_changer').animate({"left":"0px"},function(){
			$('.demo_changer').toggleClass("active");
		});
	}

	$('.demo_changer .demo-icon').click(function(){

		if($('.demo_changer').hasClass("active")){
			$('.demo_changer').animate({"left":"-400px"},function(){
				$('.demo_changer').toggleClass("active");
			});						
		}else{
			$('.demo_changer').animate({"left":"0px"},function(){
				$('.demo_changer').toggleClass("active");
			});			
		} 
	});
	all_regions = $('.sRegion').html();
	if($(' .item-post #countryId option').size()<3){
		
		$(".item-post #countryId option:last").attr("selected","selected");
		$(' .item-post #countryId').parent().fadeOut();
	}
	$(".list-group.usermenu li:not([class*='list-group-item'])").addClass("list-group-item");
	/*//Global Ajax Complete*/
	$("body").bind("ajaxSend", function(e, xhr, settings){
		//Sent
	}).bind("ajaxComplete", function(e, xhr, settings){
		/*//Complete*/
		$('select:not([class])').addClass("form-control");
		if($("#plugin-hook").length){
			$('#plugin-hook input[type=text]:not([class]),#plugin-hook textarea,#plugin-hook select').addClass("form-control");
		}
	}).bind("ajaxError", function(e, xhr, settings, thrownError){
		/*//Error*/
	});
	
	$('span.currency-aiclassy').text($("select#currency").find("option:selected").val());
	$('span.currency-aiclassy').text($("input#currency").val());
	$( "select#currency" ).change(function() {
		 $('span.currency-aiclassy').text($(this).find("option:selected").val());
	});
	
	$("a.badge.view-all").click(function() { 
		$(this).find('i').toggleClass('fa-plus').toggleClass('fa-minus');
		$('.home-panel-category.'+$(this).attr('rel')).find('a').toggleClass('home-panel-subcategory').toggleClass('home-panel-subcategory-show');
	});
	$(".caret-up-down").click(function() { 
		$(this).find('.glyphicon').toggleClass('glyphicon-chevron-up').toggleClass('glyphicon-chevron-down');
	});
	$(".popitup").click(function() { 
		newwindow=window.open($(this).attr('href'),'name','height=400,width=400');
		if (window.focus) {newwindow.focus()}
		return false;
	});
	
	/*$("ul.themechange li a").click(function() { 
		//$("link.changetheme").attr("href",$(this).attr('rel'));
		$( "link.changetheme" ).after( '<link type="text/css" rel="stylesheet" href="'+$(this).attr('rel')+'" class="changetheme">' );
		return false;
	});*/
	$('a.watchlist >span').addClass('btn btn-success ');
	$('div.votes_vote >div:first').html($('div.Rating >p.rate_it').text());
	
	$('div.votes_results >span:first').html($('div.Rating >p.rating').text());
	$('input[type=password]:not([class]),input[type=text]:not([class]),input[type=text][class=""],select#countryId,select#currency,select#catId,textarea[class=""],textarea:not([class]),select:not([class])').addClass("form-control") ;
	$('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
      });
      /*// Slider*/
      //~ $("#slides").slidesjs({
        //~ width: 900,
        //~ height: 300,
        //~ navigation: false,
        //~ play: {
          //~ active: false,
          //~ effect: "slide",
          //~ interval: 4000,
          //~ auto: false,
          //~ swap: false,
          //~ pauseOnHover: true,
          //~ restartDelay: 2500
        //~ }
      //~ });
    /*//OK*/
    $('.r-list h1 span').click(function(){
        if(aiclassy.responsive()){
            var $parent     = $(this).parent().parent();
            if($parent.hasClass('active')){
                $parent.removeClass('active');
                $(this).find('i').removeClass('fa-caret-down');
                $(this).find('i').addClass('fa-caret-right');
            } else {
                $parent.addClass('active');
                $(this).find('i').removeClass('fa-caret-right');
                $(this).find('i').addClass('fa-caret-down');
            }
            return false;
        }
    });
    $('.see_by').hover(function(){
        $(this).addClass('hover');
    },function(){
        $(this).removeClass('hover');
    })
    /*//OK*/
    aiclassy.toggleClass('data-bclass-toggle','body',true);
    /*//OK*/
    /*$('.doublebutton a').click(function (event) {
        var thisParent = $(this).parent();
        if($(this).hasClass('grid-button')){
            thisParent.addClass('active');
            $('#listing-card-list').addClass('listing-grid');
        } else {
        thisParent.removeClass('active');
            $('#listing-card-list').removeClass('listing-grid');
        }
        if (history.pushState) {
            window.history.pushState($('title').text(), $('title').text(), $(this).prop('href'));
        }
        event.preventDefault();
        return;
    });*/


    /*/////// STARTS PLACE HOLDER*/
    $('body').on('focus','.has-placeholder input, .has-placeholder textarea',function(){
        var placeholder = $(this).prev();
        var thatInput  = $(this);

        if(thatInput.parents('.has-placeholder').not('.input-file')){
            placeholder.hide();
        }
    });
    $('body').on('blur','.has-placeholder input, .has-placeholder textarea',function(){
        var placeholder = $(this).prev();
        var thatInput  = $(this);

        if(thatInput.parents('.has-placeholder').not('.input-file')){
            if(thatInput.val() == '') {
                placeholder.show();
            }
        }
    });

    $('body').on('click touchstart','.has-placeholder label',function(){
        var placeholder = $(this)
        var thatInput  = $(this).parents('.has-placeholder').find('input, textarea');
        if(thatInput.attr('disabled') != 'disabled'){
            placeholder.hide();
            thatInput.focus();
        }
    });

    $('input[placeholder]').each(function(){
      createPlaceHolder($(this));
    });

    $('body').on("created", '[name^="select_"]',function(evt) {
        selectUi($(this));
    });

    /*//$('select').each(function(){
     //   selectUi($(this));
    //});*/

    $('.flashmessage .ico-close').click(function(){
        $(this).parents('.flashmessage').remove();
    });
    $('#mask_as_form select').on('change',function(){
        $('#mask_as_form').submit();
        $('#mask_as_form').submit();
    });

    if(typeof $.fancybox == 'function') {
        $("a.fancybox").fancybox({
            openEffect : 'none',
            closeEffect : 'none',
            nextEffect : 'fade',
            prevEffect : 'fade',
            loop : false,
            helpers : {
                title : {
                    type : 'inside'
                }
            },
            tpl: {
                prev: '<a title="'+aiclassy.fancybox_prev+'" class="fancybox-nav fancybox-prev"><span></span></a>',
                next: '<a title="'+aiclassy.fancybox_next+'" class="fancybox-nav fancybox-next"><span></span></a>',
                closeBtn : '<a title="'+aiclassy.fancybox_closeBtn+'" class="fancybox-item fancybox-close" href="javascript:;"></a>'
            }
        });

        $(".main-photo").on('click', function(e) {
            e.preventDefault();
            $("a.fancybox").first().click();
        });


    }
    if($(window).width() < 1190){
	  /*// do your stuff*/
	  $(".responsive-area-origen>div").appendTo(".responsive-area-target");
	  $("#responsive-sidebar").collapse('hide');
	}else{
		
	}
	$(window).resize(function() {
		
		
			if( $(this).width() > 1189 ) {
				if($('.responsive-area-origen').length && $('.responsive-area-target').length)
					$(".responsive-area-target>div").appendTo(".responsive-area-origen");
				
				$("#responsive-sidebar").collapse('show');
			}else{
				if($('.responsive-area-origen').length && $('.responsive-area-target').length)
					$(".responsive-area-origen>div").appendTo(".responsive-area-target");
				$("#responsive-sidebar").collapse('hide');
			}
		
	});
	[].forEach.call(document.querySelectorAll('.adsbygoogle'), function(){
			(adsbygoogle = window.adsbygoogle || []).push({});
		});
	/*$(window).scroll(function() {
		$('.animatecss').each(function(){
		var imagePos = $(this).offset().top;

		var topOfWindow = $(window).scrollTop();
			if (imagePos < topOfWindow+500) {
				$(this).addClass("slideUp");
			}
		});
	});*/
	/*// Carousel (slider)*/
	$('#detailCarousel').carousel({
		interval: 4000
	});
	$('[id^=carousel-selector-]').click( function(){
		var id_selector = $(this).attr("id");
		var id = id_selector.substr(id_selector.length -1);
		id = parseInt(id);
		$('#detailCarousel').carousel(id);
		$('[id^=carousel-selector-]').removeClass('selected');
		$(this).addClass('selected');
	});
		$('#detailCarousel').on('slid', function (e) {
		var id = $('.item.active').data('slide-number');
		id = parseInt(id);
		$('[id^=carousel-selector-]').removeClass('selected');
		$('[id^=carousel-selector-'+id+']').addClass('selected');
	});    
	
	
	
});

[].forEach.call(document.querySelectorAll('.adsbygoogle'), function(){
    (adsbygoogle = window.adsbygoogle || []).push({});
});
