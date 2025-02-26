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
					<h2 class="h_color"><?php _e('ALREADY <strong>ACCOUNT?</strong>', 'decent_mobile'); ?></h2>
					<span class="txt_color_2"><?php _e('Fill up the below form to get access to site.', 'decent_mobile'); ?></span>
				</div>
				
				<form action="<?php echo osc_base_url(true); ?>" method="post">
				    <input type="hidden" name="page" value="login"  data-role="none" />
                    <input type="hidden" name="action" value="login_post"  data-role="none" />
                    <input type="hidden" name="http_referer" value="<?php echo osc_base_url(true); ?>"/>
				<div class="login-field-wrap">
					<span class="left-icon thm_color txt_color_1"><span class="fa fa-user"></span></span>
                        <input type="text" name="email" id="email" placeholder="<?php   echo osc_esc_html(__('Username', 'decent_mobile')); ?>" value=""  class="login-field"/>
				</div>
				<div class="login-field-wrap">
					<span class="left-icon thm_color txt_color_1"><span class="	fa fa-key"></span></span>
                     <input type="password" name="password" id="password" placeholder="<?php   echo osc_esc_html(__('Password', 'decent_mobile')); ?>" value="" class="login-field"/>
				</div>
				<span style="float: right;" class="txt_color_2">
					<input type="checkbox" name="rememberMe" id="rememberMe" /> <?php _e('Remember me', 'decent_mobile') ; ?>
				</span>
				<br />
				<br />
				<br />
				<div class="login-btns">
					<div class="row">
						<div class="col-xs-6">
							<p><button type="submit" name="submit" class="btn btn-block btn_color_2 txt_color_1"><?php   echo osc_esc_html(__('Login', 'decent_mobile')); ?></button></p>
						</div>
						<div class="col-xs-6">
							<p><a href="<?php echo osc_register_account_url() ; ?>" class="btn post_btn_bg post_btn_color btn-block"><?php   echo osc_esc_html(__('Sign Up', 'decent_mobile')); ?></a></p>
						</div>
					</div>
				</div>
				<div class="login-bot">
					<a class="txt_color_2" href="<?php echo osc_recover_user_password_url() ; ?>"><?php _e("Forgot password?", 'decent_mobile') ; ?></a>
				</div> 
			</div>

   
			</form>
		</div><!--login-section-wrap -->
		<script type="text/javascript">
		$(document).ready(function(){
			  $('#content').addClass('form_bg');
		});
		</script>
        <?php osc_current_web_theme_path('footer.php') ; ?>
