<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<style type="text/css" media="screen">
    .command { background-color: white; color: #2E2E2E; border: 1px solid black; padding: 8px; }
    .theme-files { min-width: 500px; }
</style>
<h2 class="render-title"><?php _e('Favicon', 'aiclassy'); ?></h2>
<?php
    $favicon_prefence = osc_get_preference('favicon', 'aiclassy_theme');
?>
<?php if( is_writable( osc_uploads_path()) ) { ?>
    <?php if($favicon_prefence) { ?>
        <h3 class="render-title"><?php _e('Preview', 'aiclassy') ?></h3>
        <img border="0" alt="<?php echo osc_esc_html( osc_page_title() ); ?>" src="<?php echo aiclassy_upload_url_favicon().'favicon-144.'.$favicon_prefence.'?'.filemtime(aiclassy_upload_path_favicon() . 'favicon.'.osc_get_preference('favicon','aiclassy_theme'));?>" />
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/Favicon.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
            <input type="hidden" name="action_specific" value="remove_favicon" />
            <fieldset>
                <div class="form-horizontal">
                    <div class="form-actions">
                        <input id="button_remove" type="submit" value="<?php echo osc_esc_html(__('Remove favicon','aiclassy')); ?>" class="btn btn-red">
                    </div>
                </div>
            </fieldset>
        </form>
    <?php } else { ?>
        <div class="flashmessage flashmessage-warning flashmessage-inline" style="display: block;">
            <p><?php _e('No favicon has been uploaded yet', 'aiclassy'); ?></p>
        </div>
    <?php } ?>
    <h2 class="render-title separate-top"><?php _e('Upload favicon', 'aiclassy') ?></h2>
    <p>Favicon image must be 144x144 or more in sizes.</p>
    <?php if( $favicon_prefence ) { ?>
    <div class="flashmessage flashmessage-inline flashmessage-warning"><p><?php _e('<strong>Note:</strong> Uploading another favicon will overwrite the current favicon.', 'aiclassy'); ?></p></div>
    <?php } ?>
    <br/><br/>
    <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/Favicon.php'); ?>" method="post" enctype="multipart/form-data" class="nocsrf">
        <input type="hidden" name="action_specific" value="upload_logo_favicon" />
        <fieldset>
            <div class="form-horizontal">
                <div class="form-row">
                    <div class="form-label"><?php _e('Logo image (png,gif,jpg)','aiclassy'); ?></div>
                    <div class="form-controls">
                        <input type="file" name="logo_favicon" id="package" />
                    </div>
                </div>
                <div class="form-actions">
                    <input id="button_save" type="submit" value="<?php echo osc_esc_html(__('Upload','aiclassy')); ?>" class="btn btn-submit">
                </div>
            </div>
        </fieldset>
    </form>
<?php } else { ?>
    <div class="flashmessage flashmessage-error" style="display: block;">
        <p>
            <?php
                $msg  = sprintf(__('The images folder <strong>%s</strong> is not writable on your server', 'aiclassy'), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) .", ";
                $msg .= __("Osclass can't upload the favicon image from the administration panel.", 'aiclassy') . ' ';
                $msg .= __('Please make the aforementioned image folder writable.', 'aiclassy') . ' ';
                echo $msg;
            ?>
        </p>
        <p>
            <?php _e('To make a directory writable under UNIX execute this command from the shell:','aiclassy'); ?>
        </p>
        <p class="command">
            chmod a+w <?php echo WebThemes::newInstance()->getCurrentThemePath() ."images/"; ?>
        </p>
    </div>
<?php } ?>
