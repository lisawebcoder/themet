<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<style type="text/css" media="screen">
    .command { background-color: white; color: #2E2E2E; border: 1px solid black; padding: 8px; }
    .theme-files { min-width: 500px; }
    .table td,.table th{width:24%;}
	.table img{max-width:200px;}
</style>
<h2 class="render-title">Advertisement area</h2>
<?php
    $advertise_link_prefence_1 = osc_get_preference('advertise_link', 'aiclassy_theme');
    $advertise_link_prefence_2 = osc_get_preference('adlink@layerTop', 'aiclassy_theme');
    $advertise_link_prefence_3 = osc_get_preference('adlink@layerBottom', 'aiclassy_theme');
    $advertise_link_prefence_4 = osc_get_preference('adlink@itemRightSide', 'aiclassy_theme');
	if( is_writable( osc_uploads_path()) ) { 
		if($advertise_link_prefence_1 || $advertise_link_prefence_2 || $advertise_link_prefence_3 || $advertise_link_prefence_4) { ?>
		<table class="table" cellspacing="0" cellpadding="0" style="max-width: 100%; ">
			<tr>
					<h3 class="render-title"><?php _e('Preview', 'aiclassy') ?></h3>
				
			</tr>
			<tr>
				<th>Left sidebar advertisement area</th>
				<th>Top advertisement area on home page</th>
				<th>Bottom advertisement area on home page</th>
				<th>Right sidebar advertisement area on single item page</th>
			</tr>
			<tr>
				<td> 
					<?php if($advertise_link_prefence_1){ 
						$ad_img =osc_get_preference('advertise_image','aiclassy_theme');
						if($ad_img){ ?>
							<img border="0" alt="" src="<?php echo osc_uploads_url() .$ad_img.'?'.filemtime(osc_uploads_path() . $ad_img);?>" />
							<br><label>Ad link</label>
							<p><?php echo $advertise_link_prefence_1; ?></p>
						<?php
						}else{
							if($advertise_link_prefence_1=='http://aicheapwebhosting.com/'){
								echo '<br><label>Default advertisement displayed in this section</label>';
							}elseif(osc_get_preference('advertise_link','aiclassy_theme')=='adsense'){ ?>
								<br><label>Google adsense displayed in this section</label>
						<?php }elseif(osc_get_preference('advertise_link','aiclassy_theme')){ ?>
								<br><label>Custom HTML advertisement displayed in this section</label> <?php 
							}
						} ?>
						
					
					
					<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/advertise.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
						<input type="hidden" name="action_specific" value="remove_advertise" />
						<input type="hidden" name="advertisement_Loc" value="Gernal_left_sidebar" />
						<fieldset>
							<div class="">
								<div class="form-actions">
									<input id="button_remove" type="submit" value="Remove Ad" class="btn btn-red">
								</div>
							</div>
						</fieldset>
					</form>
					<?php }else{
							echo 'No ad uploaded!';
						} ?>
				</td>
				<td>
					<?php if($advertise_link_prefence_2){ 
						$ad_img =osc_get_preference('adfile@layerTop','aiclassy_theme');
						if($ad_img){ ?>
							<img border="0" alt="" src="<?php echo osc_uploads_url() .$ad_img.'?'.filemtime(osc_uploads_path() . $ad_img);?>" />
							<br><label>Ad link</label>
							<p><?php echo $advertise_link_prefence_2; ?></p>
						<?php
						}elseif(osc_get_preference('adlink@layerTop','aiclassy_theme')=='adsense'){ ?>
							<br><label>Google adsense displayed in this section</label>
					<?php }elseif(osc_get_preference('adlink@layerTop','aiclassy_theme')){ ?>
							<br><label>Custom HTML advertisement displayed in this section</label> <?php 
						} ?>
					<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/advertise.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
						<input type="hidden" name="action_specific" value="remove_advertise" />
						<input type="hidden" name="advertisement_Loc" value="layer_top" />
						<fieldset>
							<div class="">
								<div class="form-actions">
									<input id="button_remove" type="submit" value="Remove Ad" class="btn btn-red">
								</div>
							</div>
						</fieldset>
					</form>
					<?php }else{
							echo 'No ad uploaded!';
						} ?>
				</td>
				<td>
					<?php if($advertise_link_prefence_3){ 
						$ad_img =osc_get_preference('adfile@layerBottom','aiclassy_theme');
						if($ad_img){ ?>
							<img border="0" alt="" src="<?php echo osc_uploads_url() .$ad_img.'?'.filemtime(osc_uploads_path() . $ad_img);?>" />
							<br><label>Ad link</label>
							<p><?php echo $advertise_link_prefence_3; ?></p>
						<?php
						}elseif(osc_get_preference('adlink@layerBottom','aiclassy_theme')=='adsense'){ ?>
							<br><label>Google adsense displayed in this section</label>
					<?php }elseif(osc_get_preference('adlink@layerBottom','aiclassy_theme')){ ?>
							<br><label>Custom HTML advertisement displayed in this section</label> <?php 
						} ?>
					
					<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/advertise.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
						<input type="hidden" name="action_specific" value="remove_advertise" />
						<input type="hidden" name="advertisement_Loc" value="layer_bottom" />
						<fieldset>
							<div class="">
								<div class="form-actions">
									<input id="button_remove" type="submit" value="Remove Ad" class="btn btn-red">
								</div>
							</div>
						</fieldset>
					</form>
					<?php }else{
							echo 'No ad uploaded!';
						} ?>
				</td>
				<td>
					<?php if($advertise_link_prefence_4){  
						$ad_img =osc_get_preference('adfile@itemRightSide','aiclassy_theme');
						if($ad_img){ ?>
							<img border="0" alt="" src="<?php echo osc_uploads_url() .$ad_img.'?'.filemtime(osc_uploads_path() . $ad_img);?>" />
							<br><label>Ad link</label>
							<p><?php echo $advertise_link_prefence_4; ?></p>
						<?php
						}elseif(osc_get_preference('adlink@itemRightSide','aiclassy_theme')=='adsense'){ ?>
							<br><label>Google adsense displayed in this section</label>
					<?php }elseif(osc_get_preference('adlink@itemRightSide','aiclassy_theme')){ ?>
							<br><label>Custom HTML advertisement displayed in this section</label> <?php 
						} ?>
					
					<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/advertise.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
						<input type="hidden" name="action_specific" value="remove_advertise" />
						<input type="hidden" name="advertisement_Loc" value="Item_right_side" />
						<fieldset>
							<div class="">
								<div class="form-actions">
									<input id="button_remove" type="submit" value="Remove Ad" class="btn btn-red">
								</div>
							</div>
						</fieldset>
					</form>
					<?php }else{
							echo 'No ad uploaded!';
					} ?>
				</td>
			</tr>
        </table>
    <?php } else { ?>
        <div class="flashmessage flashmessage-warning flashmessage-inline" style="display: block;">
            <p>No ad has been uploaded yet</p>
        </div>
    <?php } ?>
    <h2 class="render-title separate-top">Add advertisement.</h2>
    <p>Left sidebar advertisement area must be 250px x 250px.</p>
    <p>Top homepage advertisement area should have maximum 90px height.</p>
    <p>Bottom homepage advertisement area should have maximum 90px height.</p>
    <p>Right sidebar of Single item page advertisement area should have maximum 290px width</p>
    <?php if( $advertise_link_prefence_1 || $advertise_link_prefence_2 || $advertise_link_prefence_3 || $advertise_link_prefence_4  ) { ?>
    <div class="flashmessage flashmessage-inline flashmessage-warning"><p><strong>Note:</strong> Uploading another Ad over a specific position, will overwrite the Ad on that specific position.</p></div>
    <?php } ?>
    <br/><br/>
    <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/aiclassy/admin/advertise.php'); ?>" method="post" enctype="multipart/form-data" class="nocsrf">
        <input type="hidden" name="action_specific" value="upload_advertise" />
        <fieldset>
            <div class="form-horizontal">
				<div class="form-row">
                    <div class="form-label">Ad image Position</div>
                    <div class="form-controls">
                        <label>
							<input type="radio" name="advertise_position" value="general_sidebar" checked=""/> Left sidebar
                        </label><br>
                        <label>
							<input type="radio" name="advertise_position" value="layer_top" /> Top homepage 
						</label><br>
                        <label>
							<input type="radio" name="advertise_position" value="layer_bottom" /> Bottom homepage 
                        </label><br>
                        <label>
							<input type="radio" name="advertise_position" value="item_right_side" /> Right sidebar of single item page
                        </label><br>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-label">Google adsense</div>
                    <div class="form-controls">
						<label>
							<input type="checkbox" name="advertise_adsense" value="yes" /> Use adsense (check this only if you have entered google adsense details in settings > adsense)
						</label><br>
                    </div>
                </div>
                <h4>OR</h4>
                <div class="form-row">
                    <div class="form-label">Custom Ads HTML</div>
                    <div class="form-controls">
                        <textarea style="height:100px;" name="google_ads_link"></textarea>
                    </div>
                </div>
                <h4>OR</h4>
                <small>Fill both fields to display your advertisement</small>
                <div class="form-row">
                    <div class="form-label">Ad image (png,gif,jpg)</div>
                    <div class="form-controls">
                        <input type="file" name="advertise_image" id="package" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label">Ad Link</div>
                    <div class="form-controls">
                        <textarea style="height:40;" name="advertise_link"></textarea>
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
                $msg .=  ' Osclass can\'t upload the Ad image from the administration panel.';
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
