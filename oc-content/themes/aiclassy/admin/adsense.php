<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<h2 class="render-title <?php echo (osc_get_preference('footer_link', 'aiclassy_theme') ? '' : 'separate-top'); ?>">Google adsense setting</h2>
<?php if(osc_get_preference('idClient@adsenseAll', 'aiclassy_theme') && osc_get_preference('type@adsenseAll', 'aiclassy_theme')){ ?>
<div class="col-lg-12 adsense text-center" >
	<h4 >Testing ad with given credentials</h4>
<ins class="adsbygoogle" style="display:block;height:255px;" 
data-ad-client="ca-<?=osc_get_preference('idClient@adsenseAll', 'aiclassy_theme');?>" 
data-ad-type="<?=osc_get_preference('type@adsenseAll', 'aiclassy_theme');?>" 
data-ad-format = 'auto'; ></ins>
<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>

<?php } ?>

<form name="theme_setting" action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/adsense.php'); ?>" method="post" class="nocsrf">
    <input type="hidden" name="action_specific" value="adsense_settings" />
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label">Adsense client pub-id <br><small>e.g. pub-XXXXXXXXXXXX1234</small></div>
                <div class="form-controls">
					<input type="text" class="xlarge" name="idClient@adsenseAll" value="<?php echo osc_esc_html( osc_get_preference('idClient@adsenseAll', 'aiclassy_theme') ); ?>">
				</div>
            </div>
            <div class="form-row">
                <div class="form-label">Adsense type</div>
                <div class="form-controls">
					<select name="type@adsenseAll" >
						<option value="text_image" 	<?php if(osc_get_preference('type@adsenseAll', 'aiclassy_theme') == 'text_image'){ echo 'selected="selected"' ; } ?>	>Text and Images</option>
						<option value="text" 	<?php if(osc_get_preference('type@adsenseAll', 'aiclassy_theme') == 'text'){ echo 'selected="selected"' ; } ?>	>Text only</option>
						<option value="image" 	<?php if(osc_get_preference('type@adsenseAll', 'aiclassy_theme') == 'image'){ echo 'selected="selected"' ; } ?>	>Images only</option>
					</select>
				</div>
            </div>
            <div class="form-actions">
                <input type="submit" value="<?php _e('Save changes', 'aiclassy'); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>
