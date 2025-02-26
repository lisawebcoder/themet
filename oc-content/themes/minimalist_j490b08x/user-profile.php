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

    $locales   = __get('locales');
    $user = osc_user();
    osc_enqueue_style('jquery-ui-custom', osc_current_web_theme_styles_url('jquery-ui/jquery-ui-1.8.20.custom.css'));
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
        <div class="content user_account">
            <h1>
                <strong><?php _e('User account manager', 'minimalist'); ?></strong>
            </h1>
            <div id="sidebar">
                <?php echo osc_private_user_menu(); ?>
            </div>
            <div id="main" class="modify_profile">
                <h2><?php _e('Update your profile', 'minimalist'); ?></h2>
                <?php UserForm::location_javascript(); ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#delete_account").click(function(){
                            $("#dialog-delete-account").dialog('open');
                        });

                        $("#dialog-delete-account").dialog({
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                "<?php echo osc_esc_js(__('Delete', 'minimalist')); ?>": function() {
                                    window.location = '<?php echo osc_base_url(true).'?page=user&action=delete&id='.osc_user_id().'&secret='.$user['s_secret']; ?>';
                                },
                                "<?php echo osc_esc_js(__('Cancel', 'minimalist')); ?>": function() {
                                    $( this ).dialog( "close" );
                                }
                            }
                        });
                    });
                </script>
                <form action="<?php echo osc_base_url(true); ?>" method="post">
                    <input type="hidden" name="page" value="user" />
                    <input type="hidden" name="action" value="profile_post" />
                    <fieldset>
                        <div class="row">
                            <label for="name"><?php _e('Name', 'minimalist'); ?></label>
                            <?php UserForm::name_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="email"><?php _e('Username', 'minimalist'); ?></label>
                            <span class="update">
                                <?php echo osc_user_username(); ?><br />
                                <?php if(osc_user_username()==osc_user_id()) { ?>
                                    <a href="<?php echo osc_change_user_username_url(); ?>"><?php _e('Modify username', 'minimalist'); ?></a>
                                <?php }; ?>
                            </span>
                        </div>
                        <div class="row">
                            <label for="email"><?php _e('E-mail', 'minimalist'); ?></label>
                            <span class="update">
                                <?php echo osc_user_email(); ?><br />
                                <a href="<?php echo osc_change_user_email_url(); ?>"><?php _e('Modify e-mail', 'minimalist'); ?></a> <a href="<?php echo osc_change_user_password_url(); ?>" ><?php _e('Modify password', 'minimalist'); ?></a>
                            </span>
                        </div>
                        <div class="row">
                            <label for="user_type"><?php _e('User type', 'minimalist'); ?></label>
                            <?php UserForm::is_company_select(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="phoneMobile"><?php _e('Cell phone', 'minimalist'); ?></label>
                            <?php UserForm::mobile_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="phoneLand"><?php _e('Phone', 'minimalist'); ?></label>
                            <?php UserForm::phone_land_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="country"><?php _e('Country', 'minimalist'); ?> *</label>
                            <?php UserForm::country_select(osc_get_countries(), osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="region"><?php _e('Region', 'minimalist'); ?> *</label>
                            <?php UserForm::region_select(osc_get_regions(), osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="city"><?php _e('City', 'minimalist'); ?> *</label>
                            <?php UserForm::city_select(osc_get_cities(), osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="city_area"><?php _e('City area', 'minimalist'); ?></label>
                            <?php UserForm::city_area_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="address"><?php _e('Address', 'minimalist'); ?></label>
                            <?php UserForm::address_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <label for="webSite"><?php _e('Website', 'minimalist'); ?></label>
                            <?php UserForm::website_text(osc_user()); ?>
                        </div>
                        <div class="row">
                            <?php UserForm::multilanguage_info($locales, osc_user()); ?>
                        </div>
                        <div class="row">
                            <button type="submit"><?php _e('Update', 'minimalist'); ?></button>
                            <button id="delete_account" type="button" class="button red"><?php _e('Delete my account', 'minimalist'); ?></button>
                        </div>
                        <?php osc_run_hook('user_form'); ?>
                    </fieldset>
                </form>
            </div>
        </div>
        <div id="dialog-delete-account" title="<?php _e('Delete account', 'minimalist'); ?>" class="has-form-actions hide">
            <div class="form-horizontal">
                <div class="form-row">
                    <p><?php _e('All your listings and alerts will be removed, this action can not be undone.', 'minimalist');?></p>
                </div>
            </div>
        </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
    </body>
</html>