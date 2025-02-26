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
		<div class="login-section-wrap">
		<div class="login-section">
			<div class="form-text" style="text-align: center;">
				<h2 class="h_color"><?php _e('Recover your password', 'decent_mobile') ; ?></h2>
				<span class="txt_color_2"><?php _e('Fill up the below form to get your password.', 'decent_mobile'); ?></span>
			</div>
			<br />
					<form action="<?php echo osc_base_url(true) ; ?>" method="post" >
						<input type="hidden" name="page" value="login" />
						<input type="hidden" name="action" value="recover_post" />
					<div class="login-field-wrap">
						<span class="left-icon thm_color txt_color_1"><span class="fa fa-envelope-o"></span></span>
						 <input type="text" name="s_email" id="s_email" placeholder="<?php   echo osc_esc_html(__('E-mail', 'decent_mobile')) ; ?>" value="" class="login-field"/>
					</div>
					<br />
					<?php osc_show_recaptcha('recover_password'); ?>
					<br />
					<div class="login-btns">
					<div class="row">
						<div class="col-xs-12">
							<p><button type="submit" name="submit" class="btn btn_color_2 txt_color_1 btn-block"><?php   echo osc_esc_html(__('Submit Request', 'decent_mobile')); ?></button></p>
						</div>
					</div>
				</div>
					</form>
          	</div>
	</div>
		<script type="text/javascript">
		$(document).ready(function(){
			  $('#content').addClass('form_bg');
		});
		</script>
        <?php osc_current_web_theme_path('footer.php') ; ?>