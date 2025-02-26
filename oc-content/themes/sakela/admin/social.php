

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<?php $social = unserialize(osc_get_preference('social', 'sakela'));?>

<div class="__mdl_admin_container">

<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/sakela/admin/settings.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="social" />
    <h2 class="render-title"><?php _e('Social Links', 'sakela'); ?></h2>
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Facebook', 'sakela'); ?></div>
                <div class="form-controls">
                    <input type="text" class="xlarge" name="facebook" value="<?php echo osc_esc_html($social['facebook']); ?>">
                    <span class="notice-ip">http://www.facebook.com/username</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Twitter', 'sakela'); ?></div>
                <div class="form-controls">
                    <input type="text" class="xlarge" name="twitter" value="<?php echo osc_esc_html($social['twitter']); ?>">
                    <span class="notice-ip">http://www.twitter.com/username</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Instagram', 'sakela'); ?></div>
                <div class="form-controls">
                    <input type="text" class="xlarge" name="instagram" value="<?php echo osc_esc_html($social['instagram']); ?>">
                    <span class="notice-ip">http://www.instagram.com/username</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('LinkedIn', 'sakela'); ?></div>
                <div class="form-controls">
                    <input type="text" class="xlarge" name="linkedin" value="<?php echo osc_esc_html($social['linkedin']); ?>">
                    <span class="notice-ip">http://www.linkedin.com/username</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Google +', 'sakela'); ?></div>
                <div class="form-controls">
                    <input type="text" class="xlarge" name="google" value="<?php echo osc_esc_html($social['google']); ?>">
                    <span class="notice-ip">http://plus.google.com/username</span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('YouTube', 'sakela'); ?></div>
                <div class="form-controls">
                    <input type="text" class="xlarge" name="youtube" value="<?php echo osc_esc_html($social['youtube']); ?>">
                    <span class="notice-ip">http://youtube.com/username</span>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <input id="button_save" type="submit" value="<?php echo osc_esc_html(__('Save Changes','sakela')); ?>" class="btn btn-submit">
        </div>
    </fieldset>
</form>
</div>
<div class="__mdl_sakela_frame"></div>
</div>