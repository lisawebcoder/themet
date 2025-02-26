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
					<h2 class="h_color"><?php _e('<strong>Contact Us</strong>', 'decent_mobile'); ?></h2>
					<span class="txt_color_2"><?php _e('Fill up the below form to contact us.', 'decent_mobile'); ?></span>
				</div>
                    <form action="<?php echo osc_base_url(true) ; ?>" method="post" name="contact" id="contact-form">
                        <input type="hidden" name="page" value="contact" />
                        <input type="hidden" name="action" value="contact_post" />
                        <fieldset>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-user"></span></span>
								<input type="text" name="subject" id="subject" placeholder="<?php  echo osc_esc_html(__('Subject (optional)', 'decent_mobile')); ?>" value=""  class="login-field"/>
							</div>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-user"></span></span>
								<input type="text" name="yourName" id="yourName" placeholder="<?php  echo osc_esc_html(__('Your name (optional)', 'decent_mobile')) ; ?> " value=""  class="login-field"/>
							</div>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-user"></span></span>
								<input type="text" name="yourEmail" id="yourEmail" placeholder="<?php  echo osc_esc_html(__('Your e-mail address', 'decent_mobile')) ; ?>" value=""  class="login-field"/>
							</div>
							<label for="message" class="txt_color_2"><?php echo osc_esc_html(__('Message', 'decent_mobile')) ; ?></label> <?php ContactForm::your_message() ; ?>

	
                            <?php osc_show_recaptcha(); ?>
							<br />
                            <button type="submit" class="btn btn_color_2 txt_color_1 btn-block"><?php   echo osc_esc_html(__('Send', 'decent_mobile')) ; ?></button>
                            <?php osc_run_hook('user_register_form') ; ?>
                        </fieldset>
                    </form>
		</div><!--login-section-wrap -->
		<script type="text/javascript">
		$(document).ready(function(){
			  $('#content').addClass('form_bg');
		});
		</script>
        <?php osc_current_web_theme_path('footer.php') ; ?>
