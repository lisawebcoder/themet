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
<?php $decent_mobile_path = osc_admin_render_plugin_url().osc_plugin_folder(__FILE__)."index.php"; ?>

			<form action="<?php echo $decent_mobile_path; ?>" method="post" class="nocsrf">
			  <input type="hidden" name="specific" value="slider" />
			  <fieldset class="fieldset">
			<h2 class="render-title"><?php _e('Slider Setting',  'decent_mobile'); ?></h2>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e('Slides Per View ',  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="text"  name="slidesperview" value="<?php echo  osc_esc_html(osc_get_preference('slidesperview', 'decent_mobile')); ?>">
					</div>
				  </div>

				</div>
				
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e('Free Mode',  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="radio" <?php  if(osc_get_preference('slider_freemode', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="slider_freemode" value="1"><?php _e('Enable',  'decent_mobile'); ?>
						<input type="radio" <?php  if(osc_get_preference('slider_freemode', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="slider_freemode" value="0"><?php _e('Disable',  'decent_mobile'); ?>
					</div>
				  </div>

				</div>
				<div class="form-horizontal">
				  <div class="form-row">
					<div class="form-label">
					  <?php _e('Loop',  'decent_mobile'); ?>
					</div>
					<div class="form-controls">
						<input type="radio" <?php  if(osc_get_preference('slider_loop', 'decent_mobile')=='1'){echo 'checked="checked"';} ?> name="slider_loop" value="1"><?php _e('Enable',  'decent_mobile'); ?>
						<input type="radio" <?php  if(osc_get_preference('slider_loop', 'decent_mobile')=='0'){echo 'checked="checked"';} ?> name="slider_loop" value="0"><?php _e('Disable',  'decent_mobile'); ?>
					</div>
				  </div>

				</div>
			  </fieldset>
				<div class="form-actions">
					<input type="submit" value="<?php echo osc_esc_html(__('Save changes',  'decent_mobile')); ?>" class="btn btn-submit btn-success">
				</div>
			</form>
