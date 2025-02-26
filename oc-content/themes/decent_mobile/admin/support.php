<?php
	/*
	*	
	* 		Decent Mobile Theme (By Disnap Tech)
	* 		version 1.0.0
	* 	   (c) 2016 www.osclassmobile.com (info@osclassmobile.com).
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
					  <?php _e('Support and Documentation',  'decent_mobile'); ?>
					</h2>
					<div class="form-horizontal">
						<?php _e('Please go to the following link for theme documentation <a href="http://osclassmobile.com/documentation" title="Mobile theme Documentation" target="_blank">Mobile theme Documentation</a>', 'decent_mobile'); ?> <br>
						<?php _e('If you have any questions and feedback regarding the plugin, please email us at <a href="support@osclassmobile.com">support@osclassmobile.com</a>', 'decent_mobile'); ?><br><br>
				</fieldset>
				<br />


			
			  <div class="form-actions">
				<input type="submit" value="<?php echo osc_esc_html(__('Save changes',  'decent_mobile')); ?>" class="btn btn-submit btn-success">
			  </div>
			</form>
		  </div>