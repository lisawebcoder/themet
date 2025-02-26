<?php


    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    aiclassy_add_body_class('login');
    osc_current_web_theme_path('header.php');
?>
<div class="row">
	<div class="col-md-6  col-md-offset-3 col-sm-8  col-sm-offset-2 center-text">
<div class="panel panel-info">
    <div class="panel-heading">
         <h3 class="panel-title"><?php _e('Access to your account', 'aiclassy'); ?></h3>
    </div>
    <div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<?php aiclassy_show_flash_message(); ?>
			</div>
		</div>
		
        <form action="<?php echo osc_base_url(true); ?>" method="post" >
            <input type="hidden" name="page" value="login" />
            <input type="hidden" name="action" value="login_post" />

            <div class="form-group">
                <label class="control-label" for="email"><?php _e('E-mail', 'aiclassy'); ?></label>
                <?php UserForm::email_login_text(); ?>
            </div>
            <div class="form-group">
                <label class="control-label" for="password"><?php _e('Password', 'aiclassy'); ?></label>
                <?php UserForm::password_login_text(); ?>
            </div>
            <div class="form-group">
				<div class="">
                     <label for="remember"><?php UserForm::rememberme_login_checkbox();?><?php _e('Remember me', 'aiclassy'); ?></label>
                </div>
               
            </div>
             <div class="center-text">
                    <button type="submit" class="btn btn-primary"><?php _e("Log in", 'aiclassy');?></button>
                    <div class="actions">
						<a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'aiclassy'); ?></a><br /><a href="<?php echo osc_recover_user_password_url(); ?>"><?php _e("Forgot password?", 'aiclassy'); ?></a>
					</div>
             </div>
            
        </form>
    </div>
</div>
	</div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>
