<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>
	<?php osc_current_web_theme_path('header.php') ; ?>

		<div class="profile-article-in clearfix">
				<?php if(osc_count_items() == 0) { ?>

					<p class="empty" ><?php printf(__('There are no results matching "%s"', 'decent_mobile'), osc_search_pattern()) ; ?></p>

				
				<?php } else { ?>
		   <?php osc_run_hook('search_ads_listing_top'); ?>
			<?php require(osc_search_show_as() == 'list' ? 'search_list.php' : 'search_gallery.php'); ?>
			<div class="paginate">
				<?php echo mbl_search_pagination(); ?>
			</div>
				<?php } ?>
				
			<div style="height:30px;"><div id="loader" style="display:none; text-align: center;"><img src="<?php echo osc_current_web_theme_url('images/loader.gif'); ?>" tabindex='1'  class="loader_img" /></div></div>
			<p id="noresults" style="display:none"><?php _e('There are no results', 'decent_mobile'); ?></p>
	</div>
<script type="text/javascript">
// variable to hold request
var request;
var productList = 'div.myitem';
var $productList = $(productList);

var paginate = 'div.paginate';
var $paginate = $(paginate);

var filterForm = 'div.filters form';
var $filterForm = $(filterForm);

var breadcrumbs = 'div.breadcrumb';
var $breadcrumbs = $('div.breadcrumb');

// url, that way is the simpliest?


var categoryCheckboxes = 'div.chbx';

var sortBy = 'p.see_by a';

$(document).ready(function () {


	
	// click on pagination
	$('.searchPaginationNext').live('click', function (event) {
		var iPage = getIPage($(this));
		ajaxSearch($filterForm, iPage, event);
	});
	
	
	//hide filter button
	$(filterForm+' button[type="submit"]').parent().parent().hide();
});

$(document).ajaxSuccess(function () {
	// add loader
		$('#loader').show();
		
});

function ajaxSearch(form, pagination, event){
	if (request) {
		request.abort();
	}
	//show preloader
	$('#loader').show();
	// prevent default posting of form
	event.preventDefault();
		
	// setup some local variables
	var $form = form;
	// let's select and cache all the fields
	var $inputs = $form.find("input, select, button, textarea");
	// serialize the data in the form
	var serializedData = $form.serialize();
	serializedData += '&iPage='+pagination;
	
	// let's disable the inputs for the duration of the ajax request
	$inputs.attr("disabled", "disabled");
	
	// fire off the request to /form.php
	var request = $.ajax({
		//url: "<?php echo osc_base_url(true); ?>",
		url: $form.attr('action'),
		type: "get",
		data: serializedData,
		dataType: "html"
	});

	// callback handler that will be called on success
	request.done(function (response, textStatus, jqXHR){
	
		var results = $(response).find(productList).html();
		var pagination = $(response).find(paginate).html();
		$productList.append(results);
		$(paginate).html(pagination);
	});

	// callback handler that will be called on failure
	// also, when search return 0 results, osclass return 404, so this will display info that there is no listings
	request.fail(function (jqXHR, textStatus, errorThrown){
		$('#loader').fadeOut();
		$('#noresults').show();
		$paginate.html(' ');
	});

	// callback handler that will be called regardless
	// if the request failed or succeeded
	request.always(function () {
		// reenable the inputs
		$inputs.prop("disabled", false);
		
		//scroll to top
		$('#loader').fadeOut();
	});
}



function getIPage(a){

	var iPage = a.text();
	if(isNaN(iPage)){
		var current = $(paginate+' > ul > li > span').text();
		if(iPage == '<')
			return parseInt(current)-1;
		return parseInt(current)+1;
	}else
		return iPage;
}


  $(function() {
    $('.paginate').live('inview', function(event, isVisible) {
      if (!isVisible) { return; }
      $( ".searchPaginationNext" ).trigger( "click" );
	    $(".loader_img" ).attr('data-offset', 300);
    });
  });
</script>
	<div class="modal fade" id="alert_box" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile') ; ?></span></button>
			<h4 class="modal-title" id="myModalLabel"><?php _e("Create Alert", 'decent_mobile'); ?></h4>
		  </div>
		  <div class="modal-body">
				 <?php osc_alert_form(); ?>
		  </div>
		</div>
	  </div>
	</div>
	<?php osc_current_web_theme_path('footer.php') ; ?>
