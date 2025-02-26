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
	    <?php MblItemForm::location_javascript(); ?>
        <?php if(osc_images_enabled_at_items()) MblItemForm::photos_javascript(); ?>
		<div class="login-section-wrap">
		<div class="login-section">
			<div class="form-text" style="text-align: center;">
				<h2 class="h_color"><?php _e('Update your profile info', 'decent_mobile') ; ?></h2>
				<span class="txt_color_2"><?php _e('Fill up the below form to update your info.', 'decent_mobile'); ?></span>
			</div>
					<?php if (function_exists('profile_picture_upload')) {
						echo '<br />';
						profile_picture_upload();
					}
					echo '<br /><br />';
					?>

                    <form action="<?php echo osc_base_url(true) ; ?>" method="post">
                        <input type="hidden" name="page" value="user" />
                        <input type="hidden" name="action" value="profile_post" />
                        <fieldset>
                            <div >
                                <label class="txt_color_2"  for="name"><?php _e('Name', 'decent_mobile') ; ?></label>
                                <?php UserForm::name_text(osc_user()) ; ?>
                            </div>
                            <div >
                                <label class="txt_color_2" for="email"><?php _e('E-mail', 'decent_mobile') ; ?></label>
                                <span class="update">
                                    <?php echo osc_user_email() ; ?><br />
                                    <a class="txt_color_2" href="<?php echo osc_change_user_email_url() ; ?>"><?php _e('Modify e-mail', 'decent_mobile') ; ?></a> | <a class="txt_color_2"  href="<?php echo osc_change_user_password_url() ; ?>" ><?php _e('Modify password', 'decent_mobile') ; ?></a>
                                </span>
                            </div>
							<br />
                            <div >
                                <label class="txt_color_2" for="user_type"><?php _e('User type', 'decent_mobile') ; ?></label>
                                <?php UserForm::is_company_select(osc_user()) ; ?>
                            </div>
                            <div >
                                <label class="txt_color_2" for="phonedecent_mobile"><?php _e('Cell phone', 'decent_mobile') ; ?></label>
                                <?php UserForm::decent_mobile_text(osc_user()) ; ?>
                            </div>
                            <div >
                                <label class="txt_color_2" for="phoneLand"><?php _e('Phone', 'decent_mobile') ; ?></label>
                                <?php UserForm::phone_land_text(osc_user()) ; ?>
                            </div>
							<fieldset data-role="fieldcontain">
								<fieldset data-role="fieldcontain">
									<label class="txt_color_2" for="countryId"><?php _e('Country', 'decent_mobile'); ?></label>
									<?php MblItemForm::country_select(osc_get_countries(), osc_user()) ; ?>
								</fieldset>
								<fieldset id="field_select_region" data-role="fieldcontain" style="display:none;">
									<label class="txt_color_2" for="regionId"><?php _e('Region', 'decent_mobile'); ?></label>
								   <select name="regionId" id="list_regions" class="regionId">
								   
								   </select>
								   <?php MblItemForm::region_text_hidden(); ?>
								</fieldset>
								<fieldset id="field_select_city" data-role="fieldcontain" style="display:none;">
									<label  class="ui-select txt_color_2" for="city"><?php _e('City', 'decent_mobile'); ?></label>
								   <select name="cityId" id="list_cities" >
								   
								   </select>
								   <?php MblItemForm::city_text_hidden(); ?>
								   </fieldset>
								<fieldset id="field_select_city_area" data-role="fieldcontain" style="display:none;">
									<label class="txt_color_2" for="city"><?php _e('City Area', 'decent_mobile'); ?></label>
									<?php MblItemForm::city_area_text(osc_user()) ; ?>
								</fieldset>
								<fieldset id="field_select_address" data-role="fieldcontain" style="display:none;">
									<label class="txt_color_2" for="address"><?php _e('Address', 'decent_mobile'); ?></label>
									<?php MblItemForm::address_text(osc_user()) ; ?>
								</fieldset>
							</fieldset>
                            <div >
                                <label class="txt_color_2" for="webSite"><?php _e('Website', 'decent_mobile') ; ?></label>
                                <?php UserForm::website_text(osc_user()) ; ?>
                            </div>
							<br >
                            <div>
                                <button type="submit" class="btn btn_color_2 txt_color_1 btn-block"><?php echo osc_esc_html(__('Update', 'decent_mobile')) ; ?></button>
                            </div>
							<br >
                            <?php osc_run_hook('user_form') ; ?>
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
