<?php


    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    aiclassy_add_body_class('forgot');
    osc_current_web_theme_path('header.php');
?>
<div class="">
    <div class="header">
        <h1><?php _e('Recover your password', 'aiclassy'); ?></h1>
    </div>
    <div class="resp-wrapper">
        <form action="<?php echo osc_base_url(true); ?>" method="post" >
            <input type="hidden" name="page" value="login" />
            <input type="hidden" name="action" value="forgot_post" />
            <input type="hidden" name="userId" value="<?php echo osc_esc_html(Params::getParam('userId')); ?>" />
            <input type="hidden" name="code" value="<?php echo osc_esc_html(Params::getParam('code')); ?>" />
            <div class="form-group">
                <label class="control-label" for="new_password"><?php _e('New password', 'aiclassy'); ?></label>
                <div class="controls">
                    <input type="password" name="new_password" value="" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="new_password2"><?php _e('Repeat new password', 'aiclassy'); ?></label>
                <div class="controls">
                    <input type="password" name="new_password2" value="" />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-success"><?php _e("Change password", 'aiclassy');?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
