
    <?php if(osc_logged_user_id() !=  osc_user_id()) { ?>
    <?php     if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
        <div id="contact" class="widget-box form-container form-vertical">
            <h2><?php _e("Contact", 'aiclassy'); ?></h2>
                <ul id="error_list"></ul>
                <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                    <input type="hidden" name="action" value="contact_post" />
                    <input type="hidden" name="page" value="user" />
                    <input type="hidden" name="id" value="<?php echo osc_user_id();?>" />
                    <div class="control-group">
                        <label class="control-label" for="yourName"><?php _e('Your name', 'aiclassy'); ?>:</label>
                        <div class="controls"><?php ContactForm::your_name(); ?></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="yourEmail"><?php _e('Your email address', 'aiclassy'); ?>:</label>
                        <div class="controls"><?php ContactForm::your_email(); ?></div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="phoneNumber"><?php _e('Phone number', 'aiclassy'); ?> (<?php _e('optional', 'aiclassy'); ?>):</label>
                        <div class="controls"><?php ContactForm::your_phone_number(); ?></div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="message"><?php _e('Message', 'aiclassy'); ?>:</label>
                        <div class="controls textarea"><?php ContactForm::your_message(); ?></div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <?php osc_run_hook('item_contact_form', osc_item_id()); ?>
                            <?php if( osc_recaptcha_public_key() ) { ?>
                            <script type="text/javascript">
                                var RecaptchaOptions = {
                                    theme : 'aiclassy',
                                    aiclassy_theme_widget: 'recaptcha_widget'
                                };
                            </script>
                            <style type="text/css"> div#recaptcha_widget, div#recaptcha_image > img { width:280px; } </style>
                            <div id="recaptcha_widget">
                                <div id="recaptcha_image"><img /></div>
                                <span class="recaptcha_only_if_image"><?php _e('Enter the words above','aiclassy'); ?>:</span>
                                <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                                <div><a href="javascript:Recaptcha.showhelp()"><?php _e('Help', 'aiclassy'); ?></a></div>
                            </div>
                            <?php } ?>
                            <?php osc_show_recaptcha(); ?>
                            <button type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Send", 'aiclassy');?></button>
                        </div>
                    </div>
                </form>
                <?php ContactForm::js_validation(); ?>
        </div>
        <?php
        }
    }
    ?>

