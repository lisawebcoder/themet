<?php


    // meta tag robots
    if( osc_item_is_spam() || osc_premium_is_spam() ) {
        osc_add_hook('header','aiclassy_nofollow_construct');
    } else {
        osc_add_hook('header','aiclassy_follow_construct');
    }

    osc_enqueue_script('fancybox');
    osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
    osc_enqueue_script('jquery-validate');

    aiclassy_add_body_class('sitem');
    osc_add_hook('after-main','sidebar');
    function sidebar(){
        //osc_current_web_theme_path('item-sidebar.php');
    }

    $location = array();
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

    osc_current_web_theme_path('header.php');

?>
<div class="row content">
   <div class="col-lg-3 content-left">
	   <div class="row">
		   <div class="responsive-area-origen">
		   <?php 
				if(osc_get_preference('position@search', 'aiclassy_theme')=='vertical')
					aiclassy_draw_search_form_1('vertical');
					aiclassy_draw_categories_list_4(); 
					aiclassy_sidebar_listing();
				if( osc_get_preference('facebook@page', 'aiclassy_theme') == 'show' ) {
					facebook_like_page();
				}
				echo '<div class="clear" style="margin-top:10px;"></div>';
				aiclassy_draw_advertisement_area('general_sidebar');
		   ?>
		   </div>
	   </div>
      
   </div>
   <div class="col-lg-9 content-right">
        <?php aiclassy_draw_breadcrumb(); ?>
		<h2><?php echo osc_item_title() . ' ' . osc_item_city(); ?></h2>
          <div class="row">
            <div class="col-md-8">
				<?php if( osc_images_enabled_at_items() ) { ?>
              <div class="row">
                <div class="col-md-12" id="slider">
                  <div class="col-md-12" id="carousel-bounding-box" style="padding: 0;">
                    <div id="detailCarousel" class="carousel slide">
                      <div class="carousel-inner">
						  <?php if( osc_count_item_resources() > 0 ) {  ?>
						<?php $thumbs_n=array(); for ( $i = 0; osc_has_item_resources(); $i++ ) { 
							array_push($thumbs_n,osc_resource_thumbnail_url());
							?>
						
						<div class="<?php if($i==0) { echo 'active'; } ?> item" data-slide-number="<?php echo $i; ?>">
							<img src="<?php echo osc_resource_url(); ?>" class="img-responsive" alt="<?php _e('Image', 'aiclassy'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>" title="<?php _e('Image', 'aiclassy'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>" />
						</div>
						<?php } ?>
						<?php }else{ ?>
							<div class="active item" data-slide-number="1">
							<img src="<?php echo osc_current_web_theme_url('images/no_image_available.jpg'); ?>" class="img-responsive" alt="No Image" title="No Image" />
						</div>
						<?php } ?>
                      </div>
                      <a class="carousel-control left" href="#detailCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                      <a class="carousel-control right" href="#detailCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              <div class="row">
                <div class="col-md-12 hidden-sm hidden-xs" id="slider-thumbs">
                  <ul class="list-inline">
					  <?php if( osc_count_item_resources() > 0 ) {  ?>
					<?php $i=0; foreach ($thumbs_n as $value) { ?>
					<li><a id="carousel-selector-<?php echo $i; ?>" <?php if($i==0) { echo 'class="selected"'; } $i++; ?> >
						<img src="<?php echo $value ?>" class="img-responsive"  alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
					</a></li>
					<?php } ?>
					<?php }else{ ?>
					<li><a id="carousel-selector-1" class="selected" >
						<img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" class="img-responsive"  alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
					</a></li>
						<?php } ?>
                  </ul>    
                </div> 
              </div>
              <div class="with-nav-tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#Description" data-toggle="tab" style="padding-left: 8px; padding-right: 8px; font-size:14px;"><?php _e("Description", "aiclassy")?></a></li>
						<li><a href="#Contact" data-toggle="tab" style="padding-left: 8px; padding-right: 8px; font-size:14px;"><?php _e("Contact", "aiclassy")?></a></li>
						<?php if( osc_comments_enabled() ) {?>
							<li><a href="#Comment" data-toggle="tab" style="padding-left: 8px; padding-right: 8px; font-size:14px;"><?php _e("Comments", "aiclassy")?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="tab-content"  style="margin-top:10px;">
					<div class="tab-pane fade in active" id="Description">			  
              <p style="text-align: justify;"><?php echo osc_item_description(); ?></p>
				<div class="Rating">
					<p class="rating" style="display:none;"><?php _e("Rating", 'aiclassy');?>:</p>
					<p class="rate_it" style="display:none;"><?php _e("Rate it", 'aiclassy');?></p>
					<?php osc_run_hook('item_detail', osc_item() ); ?>					
				</div>
				<?php //if(function_exists('google_maps_routes') ) google_maps_routes();
					//else osc_run_hook('location');?>
				</div>
				<div class="tab-pane fade " id="Contact">
				<?php if( osc_item_is_expired () ) { ?>
					<p>
						<?php _e("The listing is expired. You can't contact the publisher.", 'aiclassy'); ?>
					</p>
				<?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
					<p>
						<?php _e("It's your own listing, you can't contact the publisher.", 'aiclassy'); ?>
					</p>
				<?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
					<p>
						<?php _e("You must log in or register a new account in order to contact the advertiser", 'aiclassy'); ?>
					</p>
					<p class="contact_button">
						<strong><a href="<?php echo osc_user_login_url(); ?>"><?php _e('Login', 'aiclassy'); ?></a></strong>
						<strong><a href="<?php echo osc_register_account_url(); ?>"><?php _e('Register for a free account', 'aiclassy'); ?></a></strong>
					</p>
				<?php } else { ?>
					<br><br>
				  <?php if( osc_item_user_id() != null ) { ?>
					<p class="name"><?php _e('Name', 'aiclassy') ?>: <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></p>
				<?php } else { ?>
					<p class="name"><?php printf(__('Name: %s', 'aiclassy'), osc_item_contact_name()); ?></p>
				<?php } ?>
				<?php if( osc_item_show_email() ) { ?>
					<p class="email"><?php printf(__('E-mail: %s', 'aiclassy'), osc_item_contact_email()); ?></p>
				<?php } ?>
				<?php if ( osc_user_phone() != '' ) { ?>
					<p class="phone"><?php printf(__("Phone: %s", 'aiclassy'), osc_user_phone()); ?></p>
				<?php }  
					if(function_exists('mdh_messenger_contact_form') ){
						mdh_messenger_contact_form(); }else{
					?>
				<ul id="error_list"></ul>
                  <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form" <?php if(osc_item_attachment()) { echo 'enctype="multipart/form-data"'; };?> >
                    <?php osc_prepare_user_info(); ?>
                    <input type="hidden" name="action" value="contact_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                    <div id="no-has-placeholder" class="form-group">
                      <label for="yourName"><?php _e('Your name', 'aiclassy'); ?></label>
                      <input type="text" class="form-control"  value="" name="yourName" id="yourName" placeholder="<?php _e("Enter your name", 'aiclassy');?>">
                      
                    </div>
                    <div id="no-has-placeholder" class="form-group">
                      <label for="InputEmail"><?php _e('Email address', 'aiclassy'); ?></label>
                      <input type="text" class="form-control"  value="" name="yourEmail" id="yourEmail" placeholder="<?php _e("Enter your email", 'aiclassy');?>">
                      
                    </div>
                    <input type="hidden" value="" name="phoneNumber" id="phoneNumber">
                    <div class="form-group">
                      <label for="InputText"><?php _e("Your text", 'aiclassy');?></label>
                      <textarea class="form-control" id="InputText" name="message" placeholder="<?php _e("Type in your message", 'aiclassy');?>" rows="5" style="margin-bottom:10px;"></textarea>
                    </div>
                    <div class="control-group">
						<div class="controls">
							<?php osc_run_hook('item_contact_form', osc_item_id()); ?>
							<?php if( osc_recaptcha_public_key() ) { ?>
							<script type="text/javascript">
								var RecaptchaOptions = {
									theme : 'aiclassy',
									aiclassy_theme_widget: 'recaptcha_widget'
								};
							</script>							
							<?php } ?>
							<?php osc_show_recaptcha(); ?>
						</div>
					</div>
                    <button class="btn btn-info" type="submit"><?php _e("Send", 'aiclassy');?></button>
                  </form>
                  <?php ContactForm::js_validation(); }?>
				  <?php } ?>
                </div>
              <?php if( osc_comments_enabled() ) { ?>
					<div class="tab-pane fade" id="Comment">
						<?php if( osc_count_item_comments() >= 1 ) { ?>
							<div class="comments_list">
								<?php while ( osc_has_item_comments() ) { ?>
									<div class="comment">
										<h3><strong><?php echo osc_comment_title() ; ?></strong> <em><?php _e("by", 'aiclassy') ; ?> <?php echo osc_comment_author_name() ; ?>:</em></h3>
										<p><?php echo osc_comment_body() ; ?> </p>
										<?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
										<p>
											<a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'aiclassy'); ?>"><?php _e('Delete', 'aiclassy'); ?></a>
										</p>
										<?php } ?>
									</div>
								<?php } ?>
								<div class="pagination">
									<?php echo osc_comments_pagination(); ?>
								</div>
							</div>
						<?php } ?>
						<form action="<?php echo osc_base_url(true) ; ?>" method="post">
							<fieldset>
								<h4><?php _e('Leave your comment (spam and offensive messages will be removed)', 'aiclassy') ; ?></h4>
								<input type="hidden" name="action" value="add_comment" />
								<input type="hidden" name="page" value="item" />
								<input type="hidden" name="id" value="<?php echo osc_item_id() ; ?>" />
								<?php if(osc_is_web_user_logged_in()) { ?>
									<input type="hidden" name="authorName" value="<?php echo osc_logged_user_name(); ?>" />
									<input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email();?>" />
								<?php } else { ?>
									<label for="authorName"><?php _e('Your name', 'aiclassy') ; ?>:</label> <?php CommentForm::author_input_text(); ?><br />
									<label for="authorEmail"><?php _e('Your e-mail', 'aiclassy') ; ?>:</label> <?php CommentForm::email_input_text(); ?><br />
								<?php }; ?>
								<label for="title"><?php _e('Title', 'aiclassy') ; ?>:</label><?php CommentForm::title_input_text(); ?><br />
								<label for="body"><?php _e('Comment', 'aiclassy') ; ?>:</label><?php CommentForm::body_input_textarea(); ?><br />
								<button class="btn btn-success" type="submit"><?php _e('Send', 'aiclassy') ; ?></button>
							</fieldset>
						</form>
					</div>
				<?php } ?>
            </div>
            <div>
				<?php related_listings(); ?>
				<?php if( osc_count_items() > 0 ) { ?>
					<div class="similar_ads" id="similar_ads">
						<h2><?php _e('Related listings', 'aiclassy'); ?></h2>
						<?php
						View::newInstance()->_exportVariableToView("listType", 'items');
						View::newInstance()->_exportVariableToView("listClass",'listing-grid');
						osc_current_web_theme_path('loop.php');
						?>
						<div class="clear"></div>
					</div>
				<?php } ?>
			</div>
            </div>
            <div class="col-md-4">
              <table class="table table-condensed table-hover">
                <thead>
                  <th colspan="2"><?php _e("Details", 'aiclassy');?>:</th>
                </thead>
                <tbody style="font-size: 12px;">
                  <tr>
                    <td><strong><?php _e("Price", 'aiclassy');?></strong></td>
                    <td><?php if( osc_price_enabled_at_items() ) { ?><?php echo osc_item_formated_price(); ?> <?php } ?></td>
                  </tr>
                  <tr>
                    <td><strong><?php _e("Category", 'aiclassy');?></strong></td>
                    <td><?php echo osc_item_category(); ?></td>
                  </tr>
                  <tr>
                    <td><strong><?php _e("Published date", 'aiclassy');?></strong></td>
                    <td><?php if ( osc_item_pub_date() !== '' ) { printf( __('%1$s', 'aiclassy'), osc_format_date( osc_item_pub_date() ) ); } ?></td>
                  </tr>
                  <tr>
                    <td><strong><?php _e("Views");?></strong></td>
                    <td><?php echo osc_item_views(); ?></td>
                  </tr>
                  <tr>
                    <td><strong><?php _e("Country", 'aiclassy');?></strong></td>
                    <td><?php echo osc_item_country(); ?></td>
                  </tr>
                  <?php if( osc_count_item_meta() >= 1 ) { 
						while ( osc_has_item_meta() ) { 
							if(osc_item_meta_value()!='') { ?>
								<tr>
									<td><strong><?php echo osc_item_meta_name(); ?>:</strong></td>
									<td><?php echo osc_item_meta_value(); ?> </td>
								</tr>
						<?php } 
						} 
					} ?>
                  <tr>
                    <td><?php if( function_exists('show_qrcode') ) { ?>
					<?php show_qrcode(); ?>
					<?php } ?></td>
                    <td><?php if( function_exists('watchlist') ) { ?>
					<?php watchlist(); ?>
					<?php } ?></td>
                   </tr>
                </tbody>
              </table>
              <?php if(osc_get_preference('reportlisting@item', 'aiclassy_theme')=='show' && (!osc_is_web_user_logged_in() || osc_logged_user_id()!=osc_item_user_id())) { ?>
					<form action="<?php echo osc_base_url(true); ?>" method="post" name="mask_as_form" id="mask_as_form">
						<input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
						<input type="hidden" name="as" value="spam" />
						<input type="hidden" name="action" value="mark" />
						<input type="hidden" name="page" value="item" />
						<select name="as" id="as" class="form-control">
								<option><?php _e("Mark as...", 'aiclassy'); ?></option>
								<option value="spam"><?php _e("Mark as spam", 'aiclassy'); ?></option>
								<option value="badcat"><?php _e("Mark as misclassified", 'aiclassy'); ?></option>
								<option value="repeated"><?php _e("Mark as duplicated", 'aiclassy'); ?></option>
								<option value="expired"><?php _e("Mark as expired", 'aiclassy'); ?></option>
								<option value="offensive"><?php _e("Mark as offensive", 'aiclassy'); ?></option>
						</select>
					</form>
				<?php } ?>
                  <span style="padding-left: 5px;"><strong><?php _e("Seller", 'aiclassy');?>:</strong></span>
                  <div id="location" class="well">
                    <div class="row">
                      <div class="col-sm-12">
                        <h4><?php if( osc_item_user_id() != null ) { ?>
							<a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php profile_picture_show(); echo '<br>'.osc_item_contact_name(); ?></a>
						<?php } else { ?>
							<?php profile_picture_show(); printf(__('<br>%s', 'aiclassy'), osc_item_contact_name()); ?>
						<?php } ?></h4>
						
						
                        <small><?php _e("Location", 'aiclassy');?>: <cite title="<?php echo implode(', ', $location); ?>"><?php echo implode(', ', $location); ?><span class="glyphicon glyphicon-map-marker"></span></cite></small><br />
                        <?php if( osc_item_show_email() ) { ?>
							<span class="glyphicon glyphicon-envelope"></span> <?php printf(__('%s', 'aiclassy'), osc_item_contact_email()); ?><br />
						<?php } ?>
                        
                        <?php if ( osc_user_phone() != '' ) { ?>
							<span class="glyphicon glyphicon-phone-alt"></span> <?php printf(__("%s", 'aiclassy'), osc_user_phone()); ?>
						<?php } ?><br />
						<?php if( function_exists('seller_post') ) { ?>
							<?php seller_post(); ?>
						<?php } ?>
                      </div>
                    </div>
                  </div>
                  <div>
                  <?php if(function_exists('google_maps_routes') ) google_maps_routes();
					else osc_run_hook('location');?>
				  </div>
                <div class="clear" style="margin-top:10px;"></div>
			  <div class="row" style="margin-top:10px;">
					<?php if(aiclassy_check_advertisement_area('item_right_side')){
					aiclassy_draw_advertisement_area('item_right_side');
				} ?>
				
				</div>
            </div>
          
           
          </div>
          <script type="text/javascript">
				function validate_contact() {
					email = $("#yourEmail");
					message = $('#message');

					var pattern=/^([a-zA-Z0-9_\.\-\+])+@([a-zA-Z0-9_\.-])+\.([a-zA-Z])+([a-zA-Z])+/;
					var num_error = 0;

					if(!pattern.test(email.val())){
						email.css('border', '1px solid red');
						num_error = num_error + 1;
					}

					if(message.val().length < 1) {
						message.css('border', '1px solid red');
						num_error = num_error + 1;
					}

					if(num_error > 0) {
						return false;
					}

					return true;
				}
			</script>
          
   </div>
   <div class="col-md-12 hidden-lg content-left">
		<div class="row responsive-area-target">
			  <div></div>
		  </div>
    </div>
</div>    

     <?php osc_current_web_theme_path('footer.php') ; ?>
