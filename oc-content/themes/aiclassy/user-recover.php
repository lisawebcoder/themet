<?php
    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    aiclassy_add_body_class('recover');
    osc_current_web_theme_path('header.php');
?>
<div class="col-md-6  col-md-offset-3 col-sm-8  col-sm-offset-2 center-text">
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _e('Recover your password', 'aiclassy'); ?></h3>
    </div>
    <div class="panel-body">
		<?php aiclassy_show_flash_message(); ?>
        <form action="<?php echo osc_base_url(true); ?>" method="post" >
        <input type="hidden" name="page" value="login" />
        <input type="hidden" name="action" value="recover_post" />
        <div class="form-group">
            <label class="" for="email"><?php _e('E-mail', 'aiclassy'); ?></label>
            <?php UserForm::email_text(); ?>
                
        </div>
        <div class="form-group">
            <?php osc_show_recaptcha('recover_password'); ?>
        </div>
            <div class="form-group center-text" >
                <button type="submit" class="btn btn-success"><?php _e("Send me a new password", 'aiclassy');?></button>
            </div>
        </form>
    </div>
</div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
