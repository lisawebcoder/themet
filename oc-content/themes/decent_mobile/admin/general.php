<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com)
	*
	*/
?>

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
		  <div id="general">
			<form action="<?php echo $decent_mobile_path; ?>" method="post" class="nocsrf">
			  <input type="hidden" name="specific" value="general" />
			  	<fieldset class="fieldset">
					<h2 class="render-title">
					  <?php _e('Homepage Settings',  'decent_mobile'); ?>
					</h2>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Touch to Drag (Sides menu)',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('touch_drag', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="touch_drag" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('touch_drag', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="touch_drag" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Floating Header',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('floating_header', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="floating_header" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('floating_header', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="floating_header" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Header Location',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('header_location', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="header_location" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('header_location', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="header_location" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Homepage Main Image',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('show_main_banner', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="show_main_banner" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('show_main_banner', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="show_main_banner" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Homepage premium Ads Slider',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('home_premium_slider', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="home_premium_slider" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('home_premium_slider', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="home_premium_slider" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Homepage Latest Ads Slider',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('home_latest_slider', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="home_latest_slider" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('home_latest_slider', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="home_latest_slider" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>


				</fieldset>
				<br />
			  	<fieldset class="fieldset">
				<h2 class="render-title"> <?php _e('Detail Page Settings',  'decent_mobile'); ?></h2>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Details Related Ads Slider',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('detail_related_slider', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="detail_related_slider" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('detail_related_slider', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="detail_related_slider" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Show Ad Public Info',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('detail_public_info', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="detail_public_info" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('detail_public_info', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="detail_public_info" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
					<div class="form-horizontal">
					  <div class="form-row">
						<div class="form-label">
						  <?php _e('Show Ad Publisher Info',  'decent_mobile'); ?>
						</div>
						<div class="form-controls">
							<input type="radio" <?php  if(osc_get_preference('detail_publisher_info', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="detail_publisher_info" value="1"><?php _e('Enable',  'decent_mobile'); ?>
							<input type="radio" <?php  if(osc_get_preference('detail_publisher_info', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="detail_publisher_info" value="0"><?php _e('Disable',  'decent_mobile'); ?>
						</div>
					  </div>
					</div>
				</fieldset>
				<br />

			
			  <div class="form-actions">
				<input type="submit" value="<?php echo osc_esc_html(__('Save changes',  'decent_mobile')); ?>" class="btn btn-submit btn-success">
			  </div>
			</form>
		  </div>