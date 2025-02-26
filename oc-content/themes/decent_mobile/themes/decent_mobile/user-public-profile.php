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

    // meta tag robots
    $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    if(osc_user_country()!='') {
        $location_array[] = osc_user_country();
    }
    $location = implode(", ", $location_array);
    unset($location_array);
    osc_current_web_theme_path('header.php');
?>
	<link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('user_header.css') ?>" />

		<?php if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
            <div class="profile-info">
                <div class="row">
                    <div class="col-xs-12"><?php printf( __('You must <a href="%s">Login</a> or <a href="%s">Register a account</a> in order to contact the advertiser', 'decent_mobile'), osc_user_login_url(),  osc_register_account_url() );  ?></div>
                </div>
            </div>
		<?php } else { ?>
	<div class="row">
		<div class="col-lg-12 col-sm-12">

            <div class="card hovercard section_bg">
                <div class="cardheader">

                </div>
                <div class="avatar">
				     <?php if (function_exists('profile_picture_show')) {
						profile_picture_show();
					}else{?>
                    <img alt="" src="<?php echo osc_current_web_theme_url('images/no_picture.jpg'); ?>">
					<?php } ?>
                </div>

                <div class="info">
                    <div class="title">
                        <a href="#" class="txt_color_2"> <?php if( osc_item_user_id() != null ) { echo osc_user_name();}else{ echo osc_user_name();} ?></a>
                    </div>
                   <?php if ( osc_user_phone() != '' ) { ?> <div class="desc txt_color_2"><?php  echo osc_user_phone();  ?></div> <?php } ?>
                    <?php if( osc_item_show_email() ) { ?><div class="desc txt_color_2"><?php echo osc_item_contact_email(); ?></div> <?php } ?>
					<?php if( osc_user_website() ) { ?><div class="desc txt_color_2"><?php echo osc_user_website(); ?></div><?php } ?>
					<?php if($address!='') {?><div class="desc txt_color_2"><?php echo $address; ?></div><?php } ?>
					<?php if($location!='') {?><div class="desc txt_color_2"><?php echo $location; ?></div><?php } ?>
                </div>
                  <div class="profile-userbuttons">
					<a href="#user_contact" data-toggle="modal" data-backdrop="static" class="launch_modal"><button type="button" class="btn post_btn_bg post_btn_color txt_color_1"><i class="fa fa-envelope"></i> <?php _e('Message', 'decent_mobile'); ?></button></a>
					 <a href="tel:<?php echo osc_user_phone(); ?>"<button type="button" class="btn btn_color_2 txt_color_1 "><i class="fa fa-phone"></i> <?php _e('Call', 'decent_mobile'); ?></button></a>
                </div>
					<br>

            </div>
			<?php if( osc_user_info() !== '' ) { ?>
			 <h2 class="h_color "><?php _e('User description', 'decent_mobile'); ?></h2>
				 <?php echo '<div class=txt_color_2 section_bg""'.nl2br(osc_user_info()).'</div>'; ?>
			<?php } ?>
        </div>
	</div>
	<br>
		
		


<?php if(osc_count_items() > 0) { ?>
	<div class="feature-title">
    	<h2 class="h_color "><?php _e('User Listings', 'decent_mobile'); ?></h2>
    </div>
<div class="profile-article-wrap clearfix">

<div class="ad_list">
	<div class="myitem">

    <?php while(osc_has_items()) { ?>
			<div class="profile-article section_bg"  style="cursor:pointer;">
				<div class="profile-article-in clearfix">
					<div class="profile-left" onclick="location.href='<?php echo osc_item_url() ; ?>';"  >
						<?php if( osc_images_enabled_at_items() ) { ?>
						<?php if(osc_count_item_resources()) { ?>
						<img src="<?php echo osc_resource_thumbnail_url() ; ?>" alt="">
						<?php } else { ?>
						<img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="">
						<?php } ?>
						<?php } ?>
						<a href="<?php echo osc_item_url() ; ?>" class="icon-img thm_color txt_color_1"><em class="fa fa-camera"></em> <span><?php echo osc_count_item_resources(); ?></span></a>
					</div>
					<div class="profile-right">
						<h3><a class="txt_color_2" href="<?php echo osc_item_url() ; ?>"><?php echo  osc_item_title(); ?></a></h3>
						<p onclick="location.href='<?php echo osc_item_url() ; ?>';"  class="txt_color_2"><span class="fa fa-map-marker"></span> <?php echo osc_item_city();?></p>
						<p class="txt_color_2"><span class="fa fa-clock-o"></span>  <?php echo time_diff(osc_item_pub_date()); ?></p>
						<div class="clearfix">
							<div class="profile-price txt_color_2"> <?php if( osc_price_enabled_at_items() ) { echo osc_item_formated_price() ; }?></div>
						<div class="profile-like "><span style="cursor:pointer;" class="favoritelist txt_color_2" id="<?php echo osc_premium_id(); ?>"><span class="fa fa-heart-o ico_color"></span> <?php _e('Save Ad', 'decent_mobile'); ?></span> </div>
						</div>
					</div>
				</div>    
			</div>
    <?php } ?>

	</div>

	</div>
</div>                       
		<div class="paginate" style="font-size:1px; text-align:center;">
		<?php echo mbl_search_pagination(); ?>
		</div>
		<div id="loader" style="display:none; text-align: center;"><img src="<?php echo osc_current_web_theme_url('images/loader.gif'); ?>" tabindex='1'  class="loader_img" /></div>
		<p id="noresults" style="display:none"><?php _e('There are no results', 'decent_mobile'); ?></p>
<?php } ?>


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


	<div class="modal fade" id="user_contact" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile'); ?></span></button>
			<h4 class="modal-title" id="myModalLabel"><?php _e("Contact Publisher", 'decent_mobile'); ?></h4>
		  </div>
		  <div class="modal-body">
	<?php if(osc_logged_user_id()!=  osc_user_id()) { ?>
	<?php  if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
			<div id="contact" class="widget-box form-container form-vertical">
				<div class="login-section-wrap" style=" border-radius:5px; ">
					<div class="login-section contact-section">          
                    <ul id="error_list"></ul>
                    <?php ContactForm::js_validation(); ?>
					<h1></h1>
                    <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                        <input type="hidden" name="action" value="contact_post" />
                        <input type="hidden" name="page" value="user" />
                        <input type="hidden" name="id" value="<?php echo osc_user_id();?>" />
                        <?php osc_prepare_user_info(); ?>
							<div class="login-field-wrap">
								<span class="left-icon  thm_color txt_color_1"><span class="fa fa-user"></span></span>
								 <input type="text" name="yourName" id="yourName" placeholder="<?php   echo osc_esc_html(__('Your Name', 'decent_mobile')); ?>" value="" class="login-field"/>
							</div>
							<div class="login-field-wrap">
								<span class="left-icon  thm_color txt_color_1"><span class="	fa fa-envelope-o"></span></span>
								 <input type="text" name="yourEmail" id="yourEmail" placeholder="<?php   echo osc_esc_html(__('Your Email', 'decent_mobile')); ?>" value="" class="login-field"/>
							</div>
							<div class="login-field-wrap">
								<span class="left-icon  thm_color txt_color_1"><span class="	fa fa-phone"></span></span>
								 <input type="text" name="phoneNumber" id="phoneNumber" placeholder="<?php   echo osc_esc_html(__('Phone Number (Optional)', 'decent_mobile')); ?>" value="" class="login-field"/>
							</div>
							<div class="login-field-wrap">
								
								 <textarea name="message" id="message" rows="5" placeholder="<?php   echo osc_esc_html(__('Your Message', 'decent_mobile')); ?>" style="width:100%;"></textarea>
							</div>
					



						<div class="control-group">
							<div class="controls">
								<?php osc_run_hook('item_contact_form', osc_item_id()); ?>
								<?php if( osc_recaptcha_public_key() ) { ?>
								<script type="text/javascript">
									var RecaptchaOptions = {
										theme : 'custom',
										custom_theme_widget: 'recaptcha_widget'
									};
								</script>
								<style type="text/css">
								  div#recaptcha_widget, div#recaptcha_image > img { width:240px; margin-top: 5px; }
								  div#recaptcha_image { margin-bottom: 15px; }
								</style>
								<div id="recaptcha_widget">
									<div id="recaptcha_image"><img /></div>
									<span class="recaptcha_only_if_image"><?php _e('Enter the words above','decent_mobile'); ?>:</span>
									<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
									<div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'decent_mobile'); ?></a></div>
								</div>
								<?php } ?>
								<?php osc_show_recaptcha(); ?>
								<br />
								<div class="login-btns">
									<div class="row">
										<div class="col-xs-12">
											<p><button type="submit" name="submit" class="btn btn-block btn_color_2 txt_color_1"><?php   echo osc_esc_html(__('Send Message', 'decent_mobile')); ?></button></p>
										</div>
									</div>
								</div>							</div>
						</div>
					</form>
                </div>
                </div>
                </div>
				<?php     } ?>
				<?php } else { ?>
					<p class="section_bg txt_color_2"><?php _e('You are not allowed!', 'decent_mobile'); ?></p>
				<?php } ?>
	  </div>
	  </div>
	  </div>
	</div><!--Contact-Modal-End -->


<?php } ?>
<?php osc_current_web_theme_path('footer.php') ; ?>