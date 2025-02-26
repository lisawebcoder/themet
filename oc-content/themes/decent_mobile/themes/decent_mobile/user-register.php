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
									<h2><?php _e("DON'T HAVE <strong>ACCOUNT?</strong>", 'decent_mobile'); ?></h2>
									<span><?php _e('Fill up the below form to get access to site.', 'decent_mobile'); ?></span>
								</div>		  

							<div data-role="content" data-theme="c">
								<form name="register" id="register" action="<?php echo osc_base_url(true) ; ?>" method="post" >
									<input type="hidden" name="page" value="register" />
									<input type="hidden" name="action" value="register_post" />
									<div data-role="fieldcontain">
									<div class="login-field-wrap">
									<span class="left-icon thm_color txt_color_1"><span class="fa fa-user"></span></span>
											<input type="text" name="s_name" id="s_name" placeholder="<?php   echo osc_esc_html(__('Name', 'decent_mobile')) ; ?>" value=""  class="login-field"/>
									</div>
									<div class="login-field-wrap">
										<span class="left-icon thm_color txt_color_1"><span class="fa fa-key"></span></span>
										 <input type="password" name="s_password" id="s_password" placeholder="<?php   echo osc_esc_html(__('Password', 'decent_mobile')) ; ?>" value="" class="login-field"/>
									</div>
									<div class="login-field-wrap">
										<span class="left-icon thm_color txt_color_1"><span class="fa fa-key"></span></span>
										 <input type="password" name="s_password2" id="s_password2" placeholder="<?php   echo osc_esc_html(__('Re-type password', 'decent_mobile')) ; ?>" value="" class="login-field"/>
											<p id="password-error" style="display:none;">
												<?php _e('Passwords don\'t match', 'decent_mobile') ; ?>.
											</p>
									</div>
									<div class="login-field-wrap">
										<span class="left-icon thm_color txt_color_1"><span class="fa fa-envelope-o"></span></span>
											<input type="text" name="s_email" id="s_email" placeholder="<?php   echo osc_esc_html(__('E-mail', 'decent_mobile')) ; ?>" value=""  class="login-field"/> 
									</div>
										 <?php osc_show_recaptcha('register'); ?>

										
									</div>
									<br >
										<div class="login-btns">
											<div class="row">
												<div class="col-xs-6">
													<p><button type="submit" class="btn btn-block btn_color_2 txt_color_1"><?php   echo osc_esc_html(__('Create', 'decent_mobile')) ; ?></button></p>
												</div>
												<div class="col-xs-6">
													<p><a href="<?php echo osc_user_login_url(); ?>" class="btn post_btn_bg post_btn_color btn-block"><?php   echo osc_esc_html(__('Login', 'decent_mobile')); ?></a></p>
												</div>
											</div>
										</div>
											<?php osc_run_hook('user_register_form') ; ?>
										</div>
								</form>
						</div>	
					</div>	
		<script type="text/javascript">
		$(document).ready(function(){
			  $('#content').addClass('register-bg');
		});
		</script>
		<?php osc_current_web_theme_path('footer.php') ; ?>
