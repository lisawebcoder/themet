<?php if(!osc_get_preference('footer_link', 'minimalist_theme') && !osc_get_preference('donation', 'minimalist_theme'))
{ ?>
	<form name="_xclick" action="https://www.paypal.com/in/cgi-bin/webscr" method="post">
	    <input type="hidden" name="cmd" value="_donations">
	    <input type="hidden" name="rm" value="2">
	    <input type="hidden" name="business" value="support@classibase.com">
	    <input type="hidden" name="item_name" value="Osclass project">
	    <input type="hidden" name="return" value="http://osclass.org/paypal/">
	    <input type="hidden" name="currency_code" value="USD">
	    <input type="hidden" name="lc" value="US" />
	    <input type="hidden" name="custom" value="<?php echo osc_admin_render_theme_url('oc-content/themes/minimalist/admin/settings.php'); ?>&donation=successful&source=minimalist">
	    <div id="flashmessage" class="flashmessage flashmessage-inline flashmessage-warning" style="color: #505050; display: block; ">
	        <p><?php _e('I would like to contribute to the development of Minimalist theme with a donation of', 'minimalist'); ?> <select name="amount" class="select-box-medium">
					<option value="50">50$</option>
					<option value="25">25$</option>
					<option value="10" selected>10$</option>
					<option value="5">5$</option>
					<option value=""><?php _e('Custom', 'minimalist'); ?></option>
				</select><input type="submit" class="btn btn-mini" name="submit" value="<?php echo osc_esc_html(__('Donate', 'minimalist')); ?>"></p>
	    </div>
	</form>
<?php } ?>
<h2 class="render-title <?php echo (osc_get_preference('footer_link', 'minimalist_theme') ? '' : 'separate-top'); ?>"><?php _e('Theme settings', 'minimalist'); ?></h2>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/minimalist/admin/settings.php'); ?>" method="post">
    <input type="hidden" name="action_specific" value="settings" />
    <fieldset>
        <div class="form-horizontal">
            <div class="form-row">
                <div class="form-label"><?php _e('Search placeholder', 'minimalist'); ?></div>
                <div class="form-controls"><input type="text" class="xlarge" name="keyword_placeholder" value="<?php echo osc_esc_html(osc_get_preference('keyword_placeholder', 'minimalist_theme')); ?>"></div>
            </div>
            <div class="form-row">
                <div class="form-label"><?php _e('Footer link', 'minimalist'); ?></div>
                <div class="form-controls">
                    <div class="form-label-checkbox"><input type="checkbox" name="footer_link" value="1" <?php echo (osc_get_preference('footer_link', 'minimalist_theme') ? 'checked' : ''); ?> > <?php _e('I want to help Osclass by linking to <a href="http://osclass.org/" target="_blank">osclass.org</a> from my site with the following text:', 'minimalist'); ?></div>
                    <span class="help-box"><?php _e('powered by <a href="http://osclass.org/">Osclass</a>, <a href="http://classibase.com/minimalist-free-responsive-osclass-theme/">Minimalist</a>', 'minimalist'); ?></span>
                </div>
            </div>           
            <div class="form-row">
                <div class="form-label"><?php _e('Theme preset', 'minimalist'); ?></div>
                <div class="form-controls">
					<select name="theme_preset">
						<?php
						$theme_preset = osc_get_preference('theme_preset', 'minimalist_theme');
						$clb_minimalist_theme_presets = clb_minimalist_theme_presets();
						if(!isset($clb_minimalist_theme_presets[$theme_preset]))
						{
							$theme_preset = 'light';
						}
						$clb_minimalist_theme_presets_sel[$theme_preset] = 'selected="selected"';
						foreach($clb_minimalist_theme_presets as $k => $v)
						{
							echo '<option value="' . $k . '" ' . $clb_minimalist_theme_presets_sel[$k] . '>' . $v . '</option>';
						}
						?>
					</select>
                </div>
            </div>  

			<div class="form-row">
                <div class="form-label"><?php _e('Custom CSS', 'minimalist'); ?></div>
                <div class="form-controls">
					<textarea name="custom_css" style="width:90%; height: 300px;"><?php echo osc_esc_html(osc_get_preference('custom_css', 'minimalist_theme')); ?></textarea>
				</div>
            </div>

            <div class="form-actions">
                <input type="submit" value="<?php _e('Save changes', 'minimalist'); ?>" class="btn btn-submit">
            </div>
        </div>
    </fieldset>
</form>