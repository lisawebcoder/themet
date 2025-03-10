<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2012 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
        <?php osc_current_web_theme_path('header.php'); ?>
        <div class="content user_forms">
            <div class="inner">
                <h1><?php _e('Access to your account', 'minimalist'); ?></h1>
                <form action="<?php echo osc_base_url(true); ?>" method="post" >
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login_post" />
                    <fieldset>
                        <label for="email"><?php _e('E-mail', 'minimalist'); ?></label> <?php UserForm::email_login_text(); ?><br />
                        <label for="password"><?php _e('Password', 'minimalist'); ?></label> <?php UserForm::password_login_text(); ?><br />
                        <p class="checkbox"><?php UserForm::rememberme_login_checkbox();?> <label for="remember"><?php _e('Remember me', 'minimalist'); ?></label></p>
                        <button type="submit"><?php _e("Log in", 'minimalist');?></button>
                        <div class="more-login">
                            <a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'minimalist'); ?></a> · <a href="<?php echo osc_recover_user_password_url(); ?>"><?php _e("Forgot password?", 'minimalist'); ?></a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>