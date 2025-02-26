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
				<h3 class="h_color"> <?php _e('Change your e-mail', 'decent_mobile') ; ?></h2>
				<span class="txt_color_2"><?php _e('Fill up the below form to update your email.', 'decent_mobile'); ?></span>
			</div>
				<br />
                    <form action="<?php echo osc_base_url(true) ; ?>" method="post">
                        <input type="hidden" name="page" value="user" />
                        <input type="hidden" name="action" value="change_email_post" />
                        <fieldset>
                            <p style="text-align: center;">
                                <label for="email"><?php _e('Current e-mail', 'decent_mobile') ; ?></label>
                                <span><?php echo osc_logged_user_email(); ?></span>
                            </p>
                            <p>
								<div class="login-field-wrap">
									<span class="left-icon thm_color txt_color_1"><span class="fa fa-envelope-o"></span></span>
									 <input type="text" name="new_email" id="new_email" placeholder="<?php   echo osc_esc_html(__('New E-mail', 'decent_mobile')) ; ?>" value="" class="login-field"/>
								</div>
								<br />
                            </p>
                            <div style="clear:both;"></div>
                            <button type="submit" class="btn txt_color_1 btn-block btn_color_2"><?php   echo osc_esc_html(__('Update', 'decent_mobile')) ; ?></button>
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