<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/

    $location = array();
    if( osc_item_address() !== '' ) {
        $location[] = osc_item_address();
    }
    if( osc_item_city_area() !== '' ) {
        $location[] = osc_item_city_area();
    }
    if( osc_item_city() !== '' ) {
        $location[] = osc_item_city();
    }
    if( osc_item_region() !== '' ) {
        $location[] = osc_item_region();
    }
    if( osc_item_country() !== '' ) {
        $location[] = osc_item_country();
    }
?>

<?php osc_current_web_theme_path('header.php') ; ?>

<?php if( osc_images_enabled_at_items() ) { ?>
 <div class="slider-detail-wrap" data-snap-ignore="true">
	<div class="slider-detail">
	 <div class="details_slider">
    	<ul class="swiper-wrapper">
		<?php if( osc_count_item_resources() > 0 ) { ?> 
		 <?php for ( $i = 0; osc_has_item_resources() ; $i++ ) { ?>
		 <?php if( $i == 0 ) { ?>
        	<li class="swiper-slide">
            	<div class="detail-img">
				<a href="<?php echo osc_resource_url(); ?>" class="fancybox" data-fancybox-group="group" >
					<img src="<?php echo osc_resource_url(); ?>" alt=""></div>
					<?php if ( osc_price_enabled_at_items() ) { ?><span class="detail thm_color txt_color_1"><?php echo osc_item_formated_price() ; ?></span><?php } ?>
					       <div class="item_title picture-gradient"> <h1 class=""><?php echo osc_item_title(); ?></h1></div>

				</a>
			</li>
			<?php } else { ?>
        	<li class="swiper-slide">
            	<div class="detail-img">
				<a href="<?php echo osc_resource_url(); ?>" class="fancybox" data-fancybox-group="group" >
					<img src="<?php echo osc_resource_url(); ?>" alt=""></div>
					<?php if ( osc_price_enabled_at_items() ) { ?><span class="detail thm_color txt_color_1"><?php echo osc_item_formated_price() ; ?></span><?php } ?>
					    <div class="item_title picture-gradient"> <h1 class=""><?php echo osc_item_title(); ?></h1></div>
				</a>
		   </li>
			<?php } ?>
		<?php } ?>
		<?php }else{ ?>
        	<li class="swiper-slide">
            	<div class="detail-img">
					<img src="<?php echo osc_current_web_theme_url('images/no_photo_big.jpg'); ?>" alt=""></div>
					<?php if ( osc_price_enabled_at_items() ) { ?><span class="detail thm_color txt_color_1" style="    top: 15px;"><?php echo osc_item_formated_price() ; ?></span><?php } ?>
					    <div class="item_title picture-gradient" style="    background: linear-gradient( to bottom, rgba(0, 0, 0, 0.62) 0%, rgba(64,64,64,0) 0%, rgba(64,64,64,0) 72%, rgba(0, 0, 0, 0.62) 100% );"> <h1 class=""><?php echo osc_item_title(); ?></h1></div>
		   </li>
			<?php } ?>
        </ul>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    </div>

</div><!--slider-detail-wrap -->
	<?php } ?>
 
<?php if(osc_get_preference('detail_public_info', 'decent_mobile')=='1'){ ?>

<div class="public-info desc-section-wrap">
        <h2 class="h_color"><?php _e('Public info', 'decent_mobile') ; ?></h2>
    <div class="profile-seciton-wrap clearfix section_bg">
		<div class="profie-content">
		<?php if (count($location)>0) { ?>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><span class="ico_color  fa fa-map-marker"></span><?php _e("Location", 'decent_mobile'); ?> </div>
                    <div class="col-xs-6"><div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><a href="#location_map" data-toggle="modal" data-backdrop="static" class="launch_modal"><span class="fa fa-link" style="    margin-right: 0px;"></span><?php echo implode(', ', $location); ?></a></div> </div>
                </div>
            </div>
			<?php }; ?>
			<?php if ( osc_item_pub_date() != '' ){ ?>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><span class="ico_color  fa fa-clock-o"></span><?php echo _e('Published', 'decent_mobile'); ?></div>
                    <div class="col-xs-6" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo osc_format_date( osc_item_pub_date() ) ; ?></div>
                </div>
            </div>
			<?php } ?>
			<?php if ( osc_item_mod_date() != '' ){ ?>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><span class="ico_color  fa fa-pencil"></span> <?php echo _e('Modified', 'decent_mobile') ?></div>
                    <div class="col-xs-6" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo osc_format_date( osc_item_mod_date() ) ; ?></div>
                </div>
            </div>
			<?php } ?>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><span class="ico_color  fa fa-hashtag"></span> <?php echo _e('Item ID', 'decent_mobile'); ?></div>
                    <div class="col-xs-6"> <?php echo osc_item_id() ; ?> </div>
                </div>
            </div>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><span class="ico_color  fa fa-tag"></span> <?php echo _e('Category', 'decent_mobile'); ?></div>
                    <div class="col-xs-6" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"> <?php echo osc_item_category() ?></div>
                </div>
            </div>
			<div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><span class="ico_color  fa fa-refresh"></span> <?php echo _e('Views', 'decent_mobile'); ?></div>
                    <div class="col-xs-6"> <?php echo osc_item_views(); ?></div>
                </div>
            </div>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6 social">
                    	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode(osc_item_url()); ?>&t=<?php echo osc_item_title(); ?>"><img src="<?php echo osc_current_web_theme_url('images/icon-facebook.png'); ?>" alt=""></a>
                        <a href="https://twitter.com/share?url=<?php echo rawurlencode(osc_item_url()); ?>&text=<?php echo osc_item_title(); ?>"><img src="<?php echo osc_current_web_theme_url('images/icon-twitter.png'); ?>" alt=""></a>
                        <a href="https://plus.google.com/share?url=<?php echo rawurlencode(osc_item_url()); ?>"><img src="<?php echo osc_current_web_theme_url('images/icon-googleplus.png'); ?>" alt=""></a>
                        <a href="<?php echo osc_item_send_friend_url() ; ?>"><img src="<?php echo osc_current_web_theme_url('images/friend-mail.png'); ?>" alt=""></a>
                    </div>
                    <div class="col-xs-6">
                    	<div class="profile-like" style="    margin: 5px 0px 0px 0px;"><span style="    padding: 10px 0px 10px 0px; cursor:pointer;" class="favoritelist txt_color_2" id="<?php echo osc_item_id(); ?>"><span class="fa fa-heart-o ico_color"></span> <?php _e('Save Ad', 'decent_mobile'); ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="desc-section-wrap">
	<h2 class="h_color"><?php _e('Item Description', 'decent_mobile') ; ?></h2>
    <div class="desc-section section_bg txt_color_2">
    	<p>
            <?php echo osc_item_description() ; ?>
        </p>
		<div id="custom_fields">
		<?php if( osc_count_item_meta() >= 1 ) { ?>
			<br />
			<div class="meta_list">
				<?php while ( osc_has_item_meta() ) { ?>
					<?php if(osc_item_meta_value()!='') { ?>
						<div class="meta">
							<strong><?php echo osc_item_meta_name(); ?>:</strong> <?php echo osc_item_meta_value(); ?>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
    </div>
</div>
<?php if(osc_get_preference('detail_publisher_info', 'decent_mobile')=='1'){ ?>
<div class="desc-section-wrap">
	<h2 class="h_color"><?php _e("Publisher Info", 'decent_mobile'); ?></h2>
    <div class="profile-seciton-wrap clearfix section_bg">
        <div class="profie-content">
		<?php if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-12"><?php printf( __('You must <a href="%s">Login</a> or <a href="%s">Register a account</a> in order to contact the advertiser', 'decent_mobile'), osc_user_login_url(),  osc_register_account_url() );   ?></div>
                </div>
            </div>
		<?php } else { ?>
		
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><?php _e('Name', 'decent_mobile') ?></div>
                   <?php if( osc_item_user_id() != null ) { ?>
				   <div class="col-xs-6" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><a class="" href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><span class="fa fa-link" style="    margin-right: 0px;"></span> <?php echo osc_item_contact_name(); ?></a></div>
                    <?php } else { ?>
				   <div class="col-xs-6" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo osc_item_contact_name(); ?></div>
					<?php } ?>
                </div>
            </div>
			<?php if( osc_item_show_email() ) { ?>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><?php _e('Email', 'decent_mobile') ?>:</div>
                    <div class="col-xs-6" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo osc_item_contact_email(); ?></div>
                </div>
            </div>
			<?php } ?>
			 <?php if ( osc_user_phone() != '' ) { ?>
            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><?php _e('Phone', 'decent_mobile') ?>: </div>
                    <div class="col-xs-6" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo osc_user_phone(); ?></div>
                </div>
            </div>
			 <?php } 
			}
			?>

            <div class="profile-info txt_color_2">
                <div class="row">
                    <div class="col-xs-6"><?php _e('Total Ads by User:', 'decent_mobile') ; ?></div>
                    <div class="col-xs-6"><?php $logged_user = User::newInstance()->findByPrimaryKey(osc_item_user_id());echo $logged_user['i_items'];	?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if(osc_get_preference('detail_related_slider', 'decent_mobile')=='1'){ ?>

<?php related_listings(); ?>
<?php if(osc_count_items() > 0) { ?>
<div class="feature-section">
	<div class="feature-title">
    	<h2 class="h_color"><?php _e('Related Ads', 'decent_mobile'); ?></h2>
    </div>
    <div class="feature-slider-wrap section_bg" data-snap-ignore="true">
    	<div class="feature-slider">
        	
            <div class="related_slider">
				<div class="swiper-wrapper">
			<?php while(osc_has_items()) { ?>
				<?php if( osc_images_enabled_at_items() ) { ?>
                <div class="swiper-slide slide">
				<a href="<?php echo osc_item_url() ; ?>">
                	<div class="feature">
					<div class="prc thm_color txt_color_1"><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_item_formated_price(); }?></div>
					<?php if(osc_count_item_resources()) { ?>
						<div class="feature-img"><img src="<?php echo osc_resource_thumbnail_url() ; ?>" alt=""></div>
					<?php } else { ?>
						<div class="feature-img"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt=""></div>
                    <?php } ?>
                        <div class="overlay thm_color txt_color_1">
                        	<h4><?php echo osc_highlight( strip_tags( osc_item_title() ), 14 ) ; ?></h4>
                            <div class="clearfix">
                                <div class="" style="text-align: center;"><span class=" fa fa-map-marker"></span> <?php if(osc_item_city()!=""){ echo osc_item_city();} elseif(osc_item_region()!="") {echo osc_item_region();} else {echo osc_item_country_code();} ?></div>
                            </div>
                        </div>
                    </div>
					</a>
              </div>	 
					<?php } ?>
				<?php } ?>
                
            </div>
            </div>
        </div>
    </div>
</div><!--feature-section -->
<?php } ?>
<?php } ?>
<div class="report-wrap">
	<p><a style="color:red;" href="#report_ad"  data-toggle="modal" data-backdrop="static" class="launch_modal"><span class="glyphicon glyphicon-warning-sign"></span> <span><?php _e('Report this advertisement!', 'decent_mobile') ; ?></span></a></p>
</div>

	<div class="modal fade" id="report_ad" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile'); ?></span></button>
			<h4 class="modal-title" id="myModalLabel"><?php _e("Report Advertisment", 'decent_mobile'); ?></h4>
		  </div>
			<div class="modal-body">
			   	<?php if( osc_item_is_expired () ) { ?>
					<p>
						<?php _e("The listing is expired. You can't contact the publisher.", 'decent_mobile'); ?>
					</p>
				<?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
					<p>
						<?php _e("It's your own listing, you can't report.", 'decent_mobile'); ?>
					</p>
				<?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
					<p>
						<?php _e("You must log in or register a new account in order to contact the advertiser", 'decent_mobile'); ?>
					</p>
					<p class="contact_button">
						<strong><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'decent_mobile'); ?></a></strong>
						<strong><a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'decent_mobile'); ?></a></strong>
					</p>
				<?php } else { ?>
				<div class="category-section">
					<br><br>
					<div class="double_view" >
					<ul class="clearfix">
						<li><a class="txt_color_2 section_bg" href="<?php echo osc_item_link_spam() ; ?>"><span class="ico_color	glyphicon glyphicon-flag"></span> <span><?php _e('Spam', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2 section_bg" href="<?php echo osc_item_link_repeated() ; ?>"><span class="ico_color	glyphicon glyphicon-duplicate"></span> <span><?php _e('Duplicated', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2 section_bg" href="<?php echo osc_item_link_bad_category() ; ?>"><span class="ico_color	glyphicon glyphicon-question-sign"></span> <span><?php _e('Missing', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2 section_bg" href="<?php echo osc_item_link_expired() ; ?>"><span class="ico_color glyphicon glyphicon-trash"></span> <span><?php _e('Expired', 'decent_mobile') ; ?></span></a></li>
						<li><a class="txt_color_2 section_bg" href="<?php echo osc_item_link_offensive() ; ?>"><span class="ico_color glyphicon glyphicon-eye-close"></span> <span><?php _e('Offensive', 'decent_mobile') ; ?></span></a></li>
					</ul>
					</div>
					<br><br>
				</div>
			<?php } ?>
			</div>
		</div>
	  </div>
	</div><!--Report-Modal-End -->
	<!--Location-Modal -->
	 <?php View::newInstance()->_exportVariableToView('list_regions', Search::newInstance()->listRegions('%%%%', '>=') ) ; ?>
	 <?php if(osc_count_list_regions() > 0) {?>
	<div class="modal fade" id="location" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile') ; ?></span></button>
			<h4 class="modal-title" id="myModalLabel"><?php _e("Location", 'decent_mobile'); ?></h4>
		  </div>
		  <div class="modal-body">
			<div class="list-group">
			<?php while(osc_has_list_regions()) { ?>
				<a href="<?php echo osc_search_url(array('sRegion' => osc_list_region_name()));?>" class="list-group-item"><span class="glyphicon glyphicon-chevron-right"></span> <?php echo osc_list_region_name();?> <span class="badge">(<?php echo osc_list_region_items();?>)<span/></a>
			<?php } ?>
			</div>
		  </div>
		</div>
	  </div>
	 </div>
	  
	 <?php } ?>

	 
		<?php if ( osc_count_web_enabled_locales() > 1) { ?>
		<!--Language-Modal -->
		<div class="modal fade" id="lang" tabindex="-1" role="dialog">
			<div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile') ; ?></span></button>
				<h4 class="modal-title" id="myModalLabel"><?php _e("Language", 'decent_mobile'); ?></h4>
			  </div>
			  <div class="modal-body">
			  	<div class="category-section">
					<br><br>
					<div class="double_view" >
					<ul class="clearfix">

					<?php osc_goto_first_locale(); ?>

							<?php $i = 0;  ?>
							<?php while ( osc_has_web_enabled_locales() ) { ?>
								<li><a class="txt_color_2 section_bg <?php if( $i == 0 ) { echo "first"; } ?>" id="<?php echo osc_locale_code(); ?>" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>">
								<?php
									$lng_ico = osc_current_web_theme_url('images/'.osc_locale_code().'.png');
									$file_headers = @get_headers($lng_ico);
									if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
										echo '<span class=" ico_color fa fa-language"></span>';
									}
									else {
									
										echo '<img src="'.$lng_ico.'">';
									}?>
								    <span> <?php echo osc_locale_name(); ?></span></a></li>
								<?php $i++; ?>
							<?php } ?>

					</ul>
					</div>
					<br><br>
				</div>
			  </div>
			</div>
		  </div>
		 </div>
		 <?php } ?>
		 
		 
	<div class="modal fade" id="contact" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile') ; ?></span></button>
			<h4 class="modal-title" id="myModalLabel"><?php _e("Contact Publisher", 'decent_mobile'); ?></h4>
		  </div>
		  <div class="modal-body">
			<div id="contact" class="widget-box form-container form-vertical">
				<div class="login-section-wrap" style=" border-radius:5px; ">
					<div class="login-section contact-section">
					
				<?php if( osc_item_is_expired () ) { ?>
					<p>
						<?php _e("The listing is expired. You can't contact the publisher.", 'decent_mobile'); ?>
					</p>
				<?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
					<p>
						<?php _e("It's your own listing, you can't contact the publisher.", 'decent_mobile'); ?>
					</p>
				<?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
					<p>
						<?php _e("You must log in or register a new account in order to contact the advertiser", 'decent_mobile'); ?>
					</p>
					<p class="contact_button">
						<strong><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'decent_mobile'); ?></a></strong>
						<strong><a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'decent_mobile'); ?></a></strong>
					</p>
				<?php } else { ?>
					
					<ul id="error_list"></ul>
					
					<form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form" <?php if(osc_item_attachment()) { echo 'enctype="multipart/form-data"'; };?> >
						<?php osc_prepare_user_info(); ?>
						 <input type="hidden" name="action" value="contact_post" />
							<input type="hidden" name="page" value="item" />
							<input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-user"></span></span>
								 <input type="text" name="yourName" id="yourName" placeholder="<?php   echo osc_esc_html(__('Your Name', 'decent_mobile')); ?>" value="" class="login-field"/>
							</div>
							<div class="login-field-wrap ">
								<span class="left-icon thm_color txt_color_1"><span class="	fa fa-envelope-o"></span></span>
								 <input type="text" name="yourEmail" id="yourEmail" placeholder="<?php   echo osc_esc_html(__('Your Email', 'decent_mobile')); ?>" value="" class="login-field"/>
							</div>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="	fa fa-phone"></span></span>
								 <input type="text" name="phoneNumber" id="phoneNumber" placeholder="<?php   echo osc_esc_html(__('Phone Number (Optional)', 'decent_mobile')); ?>" value="" class="login-field"/>
							</div>
							<div class="login-field-wrap">
								
								 <textarea name="message" id="message" rows="5" placeholder="<?php   echo osc_esc_html(__('Your Message', 'decent_mobile')); ?>" style="width:100%;"></textarea>
							</div>
					

						<?php if(osc_item_attachment()) { ?>
							<div class="control-group">
								<label class="control-label" for="attachment"><?php _e('Attachment', 'decent_mobile'); ?>:</label>
								<div class="controls"><?php ContactForm::your_attachment(); ?></div>
							</div>
						<?php }; ?>

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
											<p><button type="submit" name="submit" class="btn btn-block btn_color_2 txt_color_1"><?php   echo osc_esc_html(__('Send Message', 'decent_mobile')) ; ?></button></p>
										</div>
									</div>
								</div>							</div>
						</div>
					</form>
					<?php ContactForm::js_validation(); ?>
				<?php } ?>
			</div>
		  </div>
		</div>
	  </div>
	  </div>
	  </div>
	</div><!--Contact-Modal-End -->
	<div class="modal fade" id="location_map" tabindex="-1" role="dialog">
		<div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'decent_mobile') ; ?></span></button>
			<h4 class="modal-title" id="myModalLabel"><?php _e("Location Map", 'decent_mobile'); ?></h4>
		  </div>
				<div class="modal-body">
					<div class="section_bg txt_color_2" style="padding:10px"><span class="ico_color  fa fa-map-marker"></span> <?php echo implode(', ', $location); ?></div>
					<br />
					<img align='top' border="1" src="http://maps.google.com/maps/api/staticmap?center=<?php echo implode(', ', $location); ?>&maptype=roadmap&zoom=18&size=500x500&sensor=false&maptype=HYBRID&markers=color:blue|label:<?php echo implode(', ', $location); ?>|<?php echo implode(', ', $location); ?>" alt="<?php echo implode(', ', $location); ?>">
				</div>
			</div>
		</div>
	</div><!--Location Map-Modal-End -->

	</div><!-- /container-fluid -->
      </div><!-- /content -->
	   
    <div class="report-inner section_bg">
    	<div class="row">
        	<div class="col-xs-6">
            	<a href="#contact" data-toggle="modal" data-backdrop="static" class="btn post_btn_bg post_btn_color   btn-block launch_modal"><span class=" fa fa-envelope"></span></a>
            </div>
            <div class="col-xs-6">
            	<a href="tel:<?php echo osc_user_phone(); ?>"  class="btn btn_color_2  btn-block "><span class="txt_color_1  fa fa-phone"></span></a>
            </div>
        </div>
    </div>
	<div id="flashmessage_container">
		<div class="icon-wrapper">
		  <?php osc_show_flash_message() ; ?>
		</div>
	</div>
	


	<?php osc_current_web_theme_path('footer.php') ; ?>
