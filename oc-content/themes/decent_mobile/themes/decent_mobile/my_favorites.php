<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>

<?php 
    $i_userId = osc_logged_user_id();
	if(Params::getParam('delete') != '' && osc_is_web_user_logged_in()){
		delete_item(Params::getParam('delete'), $i_userId);
	}

    $itemsPerPage = (Params::getParam('itemsPerPage') != '') ? Params::getParam('itemsPerPage') : 5;
    $iPage        = (Params::getParam('iPage') != '') ? Params::getParam('iPage') : 0;

    Search::newInstance()->addConditions(sprintf("%st_item_favorite_ads.fk_i_user_id = %d", DB_TABLE_PREFIX, $i_userId));
    Search::newInstance()->addConditions(sprintf("%st_item_favorite_ads.fk_i_item_id = %st_item.pk_i_id", DB_TABLE_PREFIX, DB_TABLE_PREFIX));
    Search::newInstance()->addTable(sprintf("%st_item_favorite_ads", DB_TABLE_PREFIX));
    Search::newInstance()->page($iPage, $itemsPerPage);

    $aItems      = Search::newInstance()->doSearch();
    $iTotalItems = Search::newInstance()->count();
    $iNumPages   = ceil($iTotalItems / $itemsPerPage) ;

    View::newInstance()->_exportVariableToView('items', $aItems);
    View::newInstance()->_exportVariableToView('search_total_pages', $iNumPages);
    View::newInstance()->_exportVariableToView('search_page', $iPage) ;

	// delete item from watchlist
	function delete_item($item, $uid){
		$conn = getConnection();
		$conn->osc_dbExec("DELETE FROM %st_item_favorite_ads WHERE fk_i_item_id = %d AND fk_i_user_id = %d LIMIT 1", DB_TABLE_PREFIX , $item, $uid);
	}
?>
	<h2 class="h_color" style="text-align:center"><?php _e('My Saved Items', 'decent_mobile'); ?></h2>
<div class="profile-article-in clearfix">

<div class="profile-article-wrap clearfix ">

        <?php if (osc_count_items() == 0) { ?>
        <h3 class="txt_color_2" style="text-align:center"><?php _e('You don\'t have any items yet', 'decent_mobile'); ?></h2>
        <?php } else { ?>
	<div class="ad_list">
	<div class="myitem">
			<?php while(osc_has_items()) { ?>
					<div class="profile-article " onclick="location.href='<?php echo osc_item_url() ; ?>';" style="cursor:pointer;">
						<div class="profile-article-in section_bg clearfix">
							<div class="profile-left">
								<?php if( osc_images_enabled_at_items() ) { ?>
								<?php if(osc_count_item_resources()) { ?>
								<img src="<?php echo osc_resource_thumbnail_url() ; ?>" alt="">
								<?php } else { ?>
								<img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="">
								<?php } ?>
								<?php } ?>
								<a href="#" class="icon-img thm_color txt_color_1"><em class="fa fa-camera"></em> <span><?php echo osc_count_item_resources(); ?></span></a>
							</div>
							<div class="profile-right">
								<h3><a class="txt_color_2" href="<?php echo osc_item_url() ; ?>"><?php echo  osc_item_title(); ?></a></h3>
								<p class="txt_color_2"><span class="fa fa-map-marker"></span> <?php echo osc_item_city();?></p>
								<p class="txt_color_2"><span class="fa fa-clock-o"></span>  <?php echo time_diff(osc_item_pub_date()); ?></p>
								<div class="clearfix">
									<div class="profile-price txt_color_2"> <?php if( osc_price_enabled_at_items() ) { echo osc_item_formated_price() ; }?></div>
									<div class="profile-like"><span class="fa fa-heart-o ico_color"></span> <a class="delete txt_color_2" onclick="javascript:return confirm('<?php echo osc_esc_js(__(' Are you sure?', 'decent_mobile')); ?>')" href="<?php echo $_SERVER['REQUEST_URI'].'&delete=' . osc_item_id(); ?>" ><?php _e('Delete', 'decent_mobile'); ?></a></div>
								</div>
							</div>
						</div>    
					</div>
			<?php } ?>
    </div>
    </div>
        <div class="paginate" style="font-size:1px; text-align:center;">
            <?php echo str_replace('page=search', 'page=user', osc_search_pagination()); ?>
        </div>
			<div id="loader" style="display:none; text-align: center;"><img src="<?php echo osc_current_web_theme_url('images/loader.gif'); ?>" tabindex='1'  class="loader_img" /></div>
			<p id="noresults" style="display:none"><?php _e('There are no results', 'decent_mobile'); ?></p>
        <?php } ?>
</div>
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


					
</script>
<script>
  $(function() {
    $('.paginate').live('inview', function(event, isVisible) {
      if (!isVisible) { return; }
      $( ".searchPaginationNext" ).trigger( "click" );
      $( ".loader_img" ).focus();
	    $(".loader_img" ).attr('data-offset', 300);
    });
  });
</script>