<?php

    // meta tag robots
    osc_add_hook('header','aiclassy_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    aiclassy_add_body_class('contact');
    osc_current_web_theme_path('header.php');
?>
<div class="form-container form-horizontal form-container-box">
    <div class="header">
        <h1><?php _e('Send to a friend', 'aiclassy'); ?></h1>
    </div>
    <div class="resp-wrapper">
        <ul id="error_list"></ul>
        <form name="sendfriend" action="<?php echo osc_base_url(true); ?>" method="post" >
            <input type="hidden" name="action" value="send_friend_post" />
            <input type="hidden" name="page" value="item" />
            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
            <?php if(osc_is_web_user_logged_in()) { ?>
                            <input type="hidden" name="yourName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                            <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
            <?php } else { ?>
            <div class="control-group">
                <label class="control-label" for="yourName"><?php _e("Your name",'aiclassy'); ?></label>
                <div class="controls ">
                    <?php SendFriendForm::your_name(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="yourEmail"><?php _e("Your e-mail",'aiclassy'); ?></label>
                <div class="controls ">
                    <?php SendFriendForm::your_email(); ?>
                </div>
            </div>
            <?php } ?>
            <div class="control-group">
                <label class="control-label" for="friendName"><?php _e("Your friend's name",'aiclassy'); ?></label>
                <div class="controls">
                    <?php SendFriendForm::friend_name(); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="friendEmail"><?php _e("Your friend's e-mail address", 'aiclassy'); ?></label> </label>
                <div class="controls">
                    <?php SendFriendForm::friend_email(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="subject">
                    <?php _e('Subject (optional)', 'aiclassy'); ?>
                </label>
                <div class="controls">
                    <?php ContactForm::the_subject(); ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="message">
                    <?php _e('Message', 'aiclassy'); ?></label>
                <div class="controls textarea">
                    <?php SendFriendForm::your_message(); ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <?php osc_run_hook('contact_form'); ?>
                    <?php osc_show_recaptcha(); ?>
                    <button type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Send", 'aiclassy');?></button>
                    <?php osc_run_hook('admin_contact_form'); ?>
                </div>
            </div>
        </form>
        <?php SendFriendForm::js_validation(); ?>
    </div>
</div>
<?php osc_current_web_theme_path('footer.php'); ?>
