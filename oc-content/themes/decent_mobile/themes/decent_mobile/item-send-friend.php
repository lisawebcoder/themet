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
					<h2 class="h_color"><?php _e('<strong>Send to a Friend</strong>', 'decent_mobile'); ?></h2>
					<span class="txt_color_2"><?php _e('Fill up the below form to share.', 'decent_mobile'); ?></span>
				</div>
                    <form id="sendfriend" name="sendfriend" action="<?php echo osc_base_url(true); ?>" method="post">
                        <fieldset>
                            <input type="hidden" name="action" value="send_friend_post" />
                            <input type="hidden" name="page" value="item" />
                            <input type="hidden" name="id" value="<?php echo osc_esc_html(osc_item_id()); ?>" />
                            <label class="txt_color_2"><?php _e('Item', 'decent_mobile'); ?>: <a class="txt_color_2" href="<?php echo osc_item_url( ); ?>"><?php echo osc_item_title(); ?></a></label><br/>
                            <?php if(osc_is_web_user_logged_in()) { ?>
                                <input type="hidden" name="yourName" value="<?php echo osc_esc_html(osc_logged_user_name()); ?>" />
                                <input type="hidden" name="yourEmail" value="<?php echo osc_esc_html(osc_logged_user_email());?>" />
                            <?php } else { ?>
								<div class="login-field-wrap">
									<span class="left-icon thm_color txt_color_1"><span class="fa fa-user"></span></span>
									<input type="text" name="yourName" id="yourName" placeholder="<?php   echo osc_esc_html(__("Your name", 'decent_mobile')) ; ?>" value=""  class="login-field"/>
								</div>
								<div class="login-field-wrap">
									<span class="left-icon thm_color txt_color_1"><span class="fa fa-envelope-o"></span></span>
									<input type="text" name="yourEmail" id="yourEmail" placeholder="<?php   echo osc_esc_html(__("Your e-mail address", 'decent_mobile')) ; ?>" value=""  class="login-field"/>
								</div>
                            <?php }; ?>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-user"></span></span>
								<input type="text" name="friendName" id="friendName" placeholder="<?php   echo osc_esc_html(__("Your friend's name", 'decent_mobile')) ; ?>" value=""  class="login-field"/>
							</div>
							<div class="login-field-wrap">
								<span class="left-icon thm_color txt_color_1"><span class="fa fa-envelope-o"></span></span>
								<input type="text" name="friendEmail" id="friendEmail" placeholder="<?php   echo osc_esc_html(__("Your friend's e-mail address", 'decent_mobile')) ; ?>" value=""  class="login-field"/>
							</div>
							<br />
                            <label for="message" class="txt_color_2"><?php   echo osc_esc_html(__('Message', 'decent_mobile')); ?></label> <?php SendFriendForm::your_message(); ?> <br/>
                            <?php osc_show_recaptcha(); ?>
                            <br/>
                            <button type="submit" class="btn btn_color_2 txt_color_1 btn-block"><?php   echo osc_esc_html(__('Send', 'decent_mobile')); ?></button>
                        </fieldset>
                    </form>

		</div><!--login-section-wrap -->
		<script type="text/javascript">
		$(document).ready(function(){
			  $('#content').addClass('form_bg');
		});
		</script>
        <?php osc_current_web_theme_path('footer.php') ; ?>
