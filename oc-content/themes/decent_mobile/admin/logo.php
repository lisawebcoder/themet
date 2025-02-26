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
			<?php
				 $logo_prefence = osc_get_preference('mobile_logo', 'decent_mobile');
			?>

			<?php if( is_writable( osc_uploads_path()) ) { ?>
				<?php if($logo_prefence) { ?>
					<h3 class="render-title"><?php _e('Preview',  'decent_mobile') ?></h3>
					<img style="max-width:100%;"  border="0" alt="<?php echo osc_esc_html( osc_page_title() ); ?>" src="<?php echo decent_mobile_logo_url().'?'.filemtime(osc_uploads_path() . osc_get_preference('mobile_logo','decent_mobile'));?>" />
					<form action="<?php echo $decent_mobile_path;?>" method="post" enctype="multipart/form-data" class="nocsrf">
						<input type="hidden" name="specific" value="remove" />
						<fieldset>
							<div class="form-horizontal">
								<div class="form-actions">
									<input id="button_remove" type="submit" value="<?php echo osc_esc_html(__('Remove logo', 'decent_mobile')); ?>" class="btn btn-red">
								</div>
							</div>
						</fieldset>
					</form>
				<?php } else { ?>
					<div class="flashmessage flashmessage-warning flashmessage-inline" style="display: block;">
						<p><?php _e('No logo has been uploaded yet',  'decent_mobile'); ?></p>
					</div>
				<?php } ?>
				<h2 class="render-title separate-top"><?php _e('Upload logo',  'decent_mobile') ?></h2>
				<p><?php _e('The preferred size of the logo is 280x90 pixels.',  'decent_mobile'); ?></p>
				<?php if( $logo_prefence ) { ?>
				<div class="flashmessage flashmessage-inline flashmessage-warning"><p><?php _e('<strong>Note:</strong> Uploading another logo will overwrite the current logo.',  'decent_mobile'); ?></p></div>
				<?php } ?>
				<br/><br/>
				<form action="<?php echo $decent_mobile_path ?>" method="post" enctype="multipart/form-data" class="nocsrf">
					<input type="hidden" name="specific" value="upload_logo" />
					<fieldset>
						<div class="form-horizontal">
							<div class="form-row">
								<div class="form-label"><?php _e('Logo image (png,gif,jpg)', 'decent_mobile'); ?></div>
								<div class="form-controls">
									<input type="file" name="mobile_logo" id="package" />
								</div>
							</div>
						<div class="form-actions">
							<input type="submit" value="<?php echo osc_esc_html(__('Save changes', 'decent_mobile')); ?>" class="btn btn-submit btn-success">
						</div>
						</div>
					</fieldset>
				</form>
			<?php } else { ?>
				<div class="flashmessage flashmessage-error" style="display: block;">
					<p>
						<?php
							$msg  = sprintf(__('The images folder <strong>%s</strong> is not writable on your server',  'decent_mobile'), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) .", ";
							$msg .= __("Osclass can't upload the logo image from the administration panel.",  'decent_mobile') . ' ';
							$msg .= __('Please make the aforementioned image folder writable.',  'decent_mobile') . ' ';
							echo $msg;
						?>
					</p>
					<p>
						<?php _e('To make a directory writable under UNIX execute this command from the shell:', 'decent_mobile'); ?>
					</p>
					<p class="command">
						chmod a+w <?php echo WebThemes::newInstance()->getCurrentThemePath() ."images/"; ?>
					</p>
				</div>
			<?php } ?>