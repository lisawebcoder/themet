<?php
    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    aiclassy_add_body_class('1register');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php') ;
?>
<div class="clear"></div>
	<div class="row content">
        <div class="col-lg-3 content-left">
			<div class="row">
			  <?php 
			   if(osc_get_preference('position@search', 'aiclassy_theme')=='vertical')
				aiclassy_draw_search_form_1('vertical'); ?>
			  <div class="responsive-area-origen">
				  <div>
					  <?php
					  /*aiclassy_draw_categories_list_2(); */
					  aiclassy_sidebar_listing();
					  aiclassy_draw_advertisement_area('general_sidebar');
					  ?>
				  </div>
				  
			  </div>
          </div>
          
        </div>
        <div class="col-lg-9 content-right">
			<?php aiclassy_draw_breadcrumb(); ?>
			<h2><?php _e('Sign Up', 'aiclassy'); ?></h2>
			<?php osc_show_widgets('user-signup'); ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="well">
                <form name="register" role="form"  action="<?php echo osc_base_url(true); ?>" method="post" >
					<input type="hidden" name="page" value="register" />
					<input type="hidden" name="action" value="register_post" />
					<ul id="error_list"></ul>
                  <div class="form-group">
                    <input type="text" autofocus="" required="" placeholder="<?php _e('Full Name', 'aiclassy'); ?>" id="s_name" name="s_name" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="text" placeholder="<?php _e('Your email', 'aiclassy'); ?>" id="s_email" name="s_email" class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="password" placeholder="<?php _e('New password', 'aiclassy'); ?>" id="s_password" name="s_password" class="form-control">
                    
                  </div>
                  <div class="form-group">
                    <input type="password" placeholder="<?php _e('Re-enter new password', 'aiclassy'); ?>" id="s_password2" name="s_password2" class="form-control">
                    <p id="password-error" style="display:none;">
                        <?php _e("Passwords don't match", 'aiclassy'); ?>
                    </p>
                  </div>
                  <?php osc_run_hook('user_register_form'); ?>
					<div class="form-group">
						<div class="controls">
							<?php osc_show_recaptcha('register'); ?>
						</div>
					</div>
                  <button type="submit" class="btn btn-lg btn-primary btn-block"><?php _e('Sign Up', 'aiclassy'); ?></button>
                </form>
              </div>
            </div>
          </div>
		</div>
	</div>
<?php UserForm::js_validation(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>
