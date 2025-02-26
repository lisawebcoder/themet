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
				<h3 class="h_color"><?php _e('Change your password', 'decent_mobile') ; ?></h2>
				<span class="txt_color_2"><?php _e('Fill up the below form to update your password.', 'decent_mobile'); ?></span>
			</div>
			<br />
                    <form action="<?php echo osc_base_url(true) ; ?>" method="post">
                        <input type="hidden" name="page" value="user" />
                        <input type="hidden" name="action" value="change_password_post" />
                        <fieldset>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-key"></span></span>
								 <input type="password" name="password" id="password" placeholder="<?php   echo osc_esc_html(__('Current Password', 'decent_mobile')) ; ?>" value="" class="login-field"/>
							</div>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-lock"></span></span>
								 <input type="password" name="new_password" id="new_password" placeholder="<?php   echo osc_esc_html(__('New Password', 'decent_mobile')); ?>" value="" class="login-field"/>
							</div>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-lock"></span></span>
								 <input type="password" name="new_password2" id="new_password2" placeholder="<?php   echo osc_esc_html(__('Repeat new password', 'decent_mobile')) ; ?>" value="" class="login-field"/>
							</div>
							<br />
                            <div style="clear:both;"></div>
                            <button type="submit" class="btn btn_color_2 txt_color_1 btn-block"><?php   echo osc_esc_html(__('Update', 'decent_mobile')) ; ?></button>
                        </fieldset>
                    </form>
		</div>
	</div>
		<script type="text/javascript">
		$(document).ready(function(){
			  $('#content').addClass('form_bg');
		});
		</script>
        <?php osc_current_web_theme_path('footer.php') ; ?>